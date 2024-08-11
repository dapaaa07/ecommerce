<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        $data = User::all();
        $product = Product::all();
        $cartCount = Cart::count();
        return view('home.index', compact('product', 'cartCount'));
    }

    public function login_home()
    {
        $product = Product::take(8)->get(); // Mengambil hanya 8 produk
        $user = Auth::user();
        $userid = $user->id;
        $cartCount = Cart::where('user_id', $userid)->count();
        return view('home.index', compact('product', 'cartCount'));
    }


    public function product_detail($id)
    {
        $data = Product::find($id);
        $product = Product::all();

        // Cek apakah pengguna sudah login
        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $cartCount = Cart::where('user_id', $userid)->count();
        } else {
            $cartCount = 0; // Atau nilai default lainnya
        }

        return view('home.product_detail', compact('data', 'product', 'cartCount'));
    }



    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();
        return redirect()->back()->with('cart', 'Berhasil ditambahkan ke keranjang!');
    }

    public function mycart()
    {
        $cart = collect(); // Membuat koleksi kosong jika pengguna tidak login

        if (Auth::check()) { // Mengecek apakah pengguna sudah login
            $user = Auth::user();
            $userid = $user->id;

            // Ambil semua item di keranjang untuk pengguna yang sedang login
            $cart = Cart::where('user_id', $userid)
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->select('products.*', 'carts.product_id')
                ->get()
                ->groupBy('product_id')
                ->map(function ($items) {
                    $item = $items->first();
                    $item->total_quantity = $items->count();

                    $priceString = $item->price;
                    $price = (float) str_replace(['K', '.', ','], ['', '', ''], $priceString); // Convert '11.700K' to 11700
                    $item->price = $price;

                    $item->total_price = $price * $item->total_quantity;

                    return $item;
                });

            $cartCount = $cart->sum('total_quantity');
        } else {
            $cartCount = 0;
        }

        return view('home.mycart', compact('cartCount', 'cart'));
    }

    public function removeCartItem($product_id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;

            // Hapus item dari keranjang
            Cart::where('user_id', $userid)
                ->where('product_id', $product_id)
                ->delete();

            // Redirect ke halaman keranjang dengan pesan sukses
            return redirect('/mycart')->with('success', 'Item berhasil dihapus dari keranjang');
        }

        // Jika pengguna tidak login, redirect ke halaman login atau halaman lain yang sesuai
        return redirect()->route('login');
    }

    public function updateQuantity(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;

            $product_id = $request->input('product_id');
            $quantityChange = $request->input('quantity_change');

            // Jika ingin menambah kuantitas, tambahkan entri baru
            if ($quantityChange > 0) {
                for ($i = 0; $i < $quantityChange; $i++) {
                    $cartItem = new Cart;
                    $cartItem->user_id = $userid;
                    $cartItem->product_id = $product_id;
                    $cartItem->save();
                }
            } else {
                // Jika ingin mengurangi kuantitas, hapus item
                $cartItems = Cart::where('user_id', $userid)
                    ->where('product_id', $product_id)
                    ->get();

                for ($i = 0; $i < abs($quantityChange); $i++) {
                    if ($cartItems->count() > 0) {
                        $cartItems->first()->delete();
                        $cartItems = $cartItems->slice(1); // Remove the first item from collection
                    }
                }
            }

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }






    public function cartCount()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $cartCount = Cart::where('user_id', $userid)->count();

            return response()->json([
                'success' => true,
                'cartCount' => $cartCount,
            ]);
        }

        return response()->json([
            'success' => false,
            'cartCount' => 0,
        ]);
    }

    public function getProductPrice($productId)
    {
        $product = Product::find($productId);
        if ($product) {
            $priceString = $product->price;
            $price = (float) str_replace(['K', '.', ','], ['', '', ''], $priceString); // Convert '11.700K' to 11700
            return response()->json(['success' => true, 'price' => $price]);
        }
        return response()->json(['success' => false]);
    }

    public function getCartCount()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cartCount = Cart::where('user_id', $user->id)->count();
        } else {
            $cartCount = 0;
        }

        return response()->json(['success' => true, 'cartCount' => $cartCount]);
    }


    // HomeController.php

    // HomeController.php

    public function checkout(Request $request)
    {
        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $userid = $user->id;

        $productIds = $request->input('product_ids', []);

        $products = Product::all();

        // Ambil item cart yang sesuai dengan produk yang dipilih
        $cartItems = Cart::where('user_id', $userid)
            ->whereIn('product_id', $productIds)
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('products.*', 'carts.product_id')
            ->get()
            ->groupBy('product_id')
            ->map(function ($items) {
                $item = $items->first();
                $item->total_quantity = $items->count();

                // Mengkonversi harga dari string ke float
                $priceString = $item->price;
                $price = (float) str_replace(['K', '.', ','], ['', '', ''], $priceString); // Convert '11.700K' to 11700
                $item->price = $price;

                // Hitung total harga untuk item tersebut
                $item->total_price = $price * $item->total_quantity;

                return $item;
            });

        // Hitung total harga dari semua produk yang dipilih
        $totalPrice = $cartItems->sum('total_price');

        // Hitung jumlah item dalam keranjang
        $cartCount = $cartItems->sum('total_quantity');

        // Tampilkan view checkout dengan data yang diperlukan
        return view('home.checkout', compact('cartItems', 'totalPrice', 'cartCount', 'user', 'productIds'));
    }

    // public function placeOrder(Request $request)
    // {

    // }



    public function checkoutSubmit(Request $request)
    {
        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $userId = $user->id;

        // Ambil data dari form
        $receiverName = $request->input('rec_name');
        $receiverAddress = $request->input('rec_address');
        $receiverPhone = $request->input('rec_phone');

        // Ambil daftar produk yang dipilih dari input dan pastikan menjadi array
        $productIds = explode(',', $request->input('product_ids', ''));

        // Pastikan productIds adalah array dan tidak kosong
        if (empty($productIds) || !is_array($productIds)) {
            return redirect()->back()->withErrors('Tidak ada produk yang dipilih');
        }

        // Ambil item cart yang sesuai dengan produk yang dipilih
        $cartItems = Cart::where('user_id', $userId)
            ->whereIn('product_id', $productIds)
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('products.*', 'carts.product_id', 'carts.quantity') // Pastikan quantity diambil
            ->get()
            ->groupBy('product_id')
            ->map(function ($items) {
                $item = $items->first();
                $item->total_quantity = $items->sum('quantity'); // Hitung total quantity
                $priceString = $item->price;
                $price = (float) str_replace(['K', '.', ','], ['', '', ''], $priceString); // Convert '11.700K' to 11700
                $item->price = $price;
                $item->total_price = $price * $item->total_quantity;
                return $item;
            });

        // Simpan data pesanan ke database
        foreach ($cartItems as $item) {
            Order::create([
                'name' => $receiverName,
                'rec_address' => $receiverAddress,
                'phone' => $receiverPhone,
                'status' => 'Pending', // Status default, bisa disesuaikan
                'user_id' => $userId,
                'product_id' => $item->id,
                'quantity' => $item->total_quantity, // Simpan quantity total
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Hapus item dari cart setelah order dibuat (opsional)
        Cart::where('user_id', $userId)
            ->whereIn('product_id', $productIds)
            ->delete();

        // Redirect ke halaman mycart dengan pesan sukses
        return redirect()->route('mycart')->with('success', 'Order berhasil ditempatkan!');
    }

    public function shop(Request $request)
    {
        $category = $request->input('category');

        // Ambil semua kategori unik dari tabel products
        $categories = Product::select('category')->distinct()->pluck('category');

        // Query produk berdasarkan kategori yang dipilih
        $query = Product::query();

        if ($category) {
            $query->where('category', $category);
        }

        $product = $query->get();

        $user = Auth::user();
        $userid = $user->id;
        $cartCount = Cart::where('user_id', $userid)->count();

        return view('home.shop', compact('product', 'cartCount', 'categories'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use  Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    // view
    public function view_category()
    {
        $data = Category::all();

        return view('admin.category', compact('data'));
    }

    // add
    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    // delete
    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('delete', 'Kategori berhasil dihapus!');
    }

    // view edit category
    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }
    // update
    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        return redirect('/view_category')->with('update', 'Kategori berhasil diubah!');
    }
    public function add_product()
    {
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }
    public function upload_product(Request $request)
    {
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }

        $data->save();
        return redirect()->back()->with('upload_product', 'Produk berhasil ditambahkan!');
    }

    public function view_product()
    {
        $product = Product::all();
        return view('admin.view_product', compact('product'));
    }

    // delete product
    public function delete_product($id)
    {
        $product = Product::find($id);
        $image_path = public_path('products/' . $product->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $product->delete();
        return redirect()->back()->with('delete_product', 'Kategori berhasil dihapus!');
    }

    // view edit product
    public function edit_product($id)
    {
        $product = Product::find($id);

        // Temukan semua kategori
        $category = Category::all();
        return view('admin.edit_product', compact('product', 'category'));
    }
    public function update_product(Request $request, $id)
    {
        $data = Product::find($id);

        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->price = $request->input('price');
        $data->quantity = $request->input('quantity');
        $data->category = $request->input('category_id'); // Perbarui kolom sesuai dengan form

        $image = $request->file('image');
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect('/view_product')->with('update_product', 'Produk berhasil diubah!');
    }

    public function product_search(Request $request)
    {
        $search = $request->search;
        $product = Product::where('title', 'LIKE', '%' . $search . '%')->orWhere('category', 'LIKE', '%' . $search . '%')->paginate(3);
        return view('admin.view_product', compact('product'));
    }

    public function showOrders()
    {
        // Ambil semua data dari tabel orders
        $orders = Order::join('products', 'orders.product_id', '=', 'products.id')
            ->select('orders.*', 'products.title', 'products.image')
            ->get();

        // Tampilkan view dengan data orders
        return view('admin.order', compact('orders'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        // Validasi data jika diperlukan
        $request->validate([
            'status' => 'required|string'
        ]);

        // Temukan pesanan berdasarkan ID dan perbarui statusnya
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        // Redirect ke halaman orders dengan pesan sukses
        return redirect()->route('orders.index')->with('success', 'Status pesanan berhasil diperbarui!');
    }

    public function printOrderPdf($orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            abort(404, 'Order not found');
        }

        $orderItems = Order::join('products', 'orders.product_id', '=', 'products.id')
            ->select('orders.*', 'products.title', 'products.price')
            ->where('orders.id', $orderId)
            ->get();

        $orderItems->map(function ($item) {
            $priceString = $item->price;
            $price = (float) str_replace(['K', '.', ','], ['', '', ''], $priceString);
            $item->price = $price;
            $item->total_price = $price * $item->quantity;
            return $item;
        });

        // Menghitung total price
        $totalPrice = $orderItems->sum('total_price');

        // Format total price menjadi string dengan format yang sesuai
        $totalPriceFormatted = number_format($totalPrice, 0) . 'K';

        $pdf = Pdf::loadView('orders.pdf', [
            'orderItems' => $orderItems,
            'totalPrice' => $totalPriceFormatted, // Kirim sebagai string dengan format
            'orderDate' => $order->updated_at->format('d M Y'),
            'name' => $order->name,
            'phone' => $order->phone,
            'orderId' => $orderId,
        ]);

        return $pdf->download('order_' . $orderId . '.pdf');
    }
}

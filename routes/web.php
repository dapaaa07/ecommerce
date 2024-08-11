<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;


route::get('/', [HomeController::class, 'home']);

route::get('/dashboard', [HomeController::class, 'login_home'])
    ->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);




route::get('view_category', [AdminController::class, 'view_category'])->middleware(['auth', 'admin']);


route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin']);

route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'admin']);


route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth', 'admin']);

route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth', 'admin']);

route::get('add_product', [AdminController::class, 'add_product'])->middleware(['auth', 'admin']);

route::post('upload_product', [AdminController::class, 'upload_product'])->middleware(['auth', 'admin']);

route::get('view_product', [AdminController::class, 'view_product'])->middleware(['auth', 'admin']);

route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'admin']);

route::get('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth', 'admin']);


Route::put('update_product/{id}', [AdminController::class, 'update_product'])->middleware(['auth', 'admin']);

route::get('product_search', [AdminController::class, 'product_search'])->middleware(['auth', 'admin']);

route::get('product_detail/{id}', [HomeController::class, 'product_detail']);

route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);


Route::get('/mycart', [HomeController::class, 'mycart'])
    ->middleware(['auth', 'verified'])
    ->name('mycart'); // Pastikan route memiliki nama

Route::get('/remove_cart_item/{product_id}', [HomeController::class, 'removeCartItem'])->name('remove_cart_item');

Route::post('/update_quantity', [HomeController::class, 'updateQuantity']);
Route::get('/cart_count', [HomeController::class, 'cartCount']);



Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/get_product_price/{productId}', [HomeController::class, 'getProductPrice']);
Route::get('/cart_count', [HomeController::class, 'getCartCount']);

Route::post('/checkout/submit', [HomeController::class, 'checkoutSubmit'])->name('checkout.submit');

route::get('view_orders', [AdminController::class, 'view_orders'])->middleware(['auth', 'admin']);
Route::get('orders', [AdminController::class, 'showOrders'])->name('orders.index');
Route::put('orders/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('updateOrderStatus');


route::get('/shop', [HomeController::class, 'shop'])->name('shop');


// Pastikan nama controller dan metode sesuai
Route::get('/order/{orderId}/print', [AdminController::class, 'printOrderPdf']);

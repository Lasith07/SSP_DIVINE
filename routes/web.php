<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\FoodItemController;
use App\Http\Controllers\CheckoutController;


Route::get('/test', function () {
    return response()->json(['message' => 'CORS is working']);
});

Route::get('/about', function () {
    $dummyData = (object) ['name' => 'Divine Bliss'];
    return view('about', compact('dummyData'));
})->name('about');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/menu/{name}', [MenuController::class, 'show'])->name('menu.item');


Route::prefix('admin/panel')->name('admin.panel.')->group(function () {
   
    Route::get('/', [FoodItemController::class, 'index'])->name('index');
    Route::get('/food-items/create', [FoodItemController::class, 'create'])->name('food-items.create');
    Route::post('/food-items', [FoodItemController::class, 'store'])->name('food-items.store');
    Route::get('/food-items/{foodItem}/edit', [FoodItemController::class, 'edit'])->name('food-items.edit');
    Route::put('/food-items/{foodItem}', [FoodItemController::class, 'update'])->name('food-items.update');
    Route::delete('/food-items/{foodItem}', [FoodItemController::class, 'destroy'])->name('food-items.destroy');
});



Route::get('/cart', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');



Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


Route::get('/', function () {
    return view('home');
})->name('home');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

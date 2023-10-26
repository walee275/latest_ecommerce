<?php

use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\VendorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/p-details', function () {
//     $related_products = Product::all();
//     $product = Product::first();
//     return view('admin.products.product_details', compact('related_products', 'product'));
// });

Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'register_user'])->name('user_registration');
Route::post('/registration', [UserController::class, 'register_user_form'])->name('user_registration.form');

Route::controller(AuthController::class)->middleware(RedirectIfAuthenticated::class)->group(function () {

    Route::get('/', 'view')->name('login');
    Route::get('/login', 'view')->name('login');
    Route::post('/login', 'login');
});



Route::prefix('admin')->name('admin.')->middleware(Authenticate::class)->group(function () {


    Route::controller(HomeController::class)->group(function () {

        Route::get('/dashboard', 'home')->name('dashboard');
        Route::get('/', 'home')->name('home');
    });

    Route::controller(UserController::class)->group(function () {

        Route::get('/users', 'index')->name('users');
        Route::get('/user/profile/{user}', 'show')->name('user.profile');
        Route::get('/users/create', 'create')->name('user.create');
        Route::post('/users/create', 'store');
        Route::get('/users/update/{user}', 'edit')->name('user.update');
        Route::post('/users/update/{user}', 'update');
        Route::get('/users/delete/{user}', 'destroy')->name('user.delete');
    });

    Route::controller(RoleController::class)->group(function () {
        Route::get('/roles', 'index')->name('roles');
        Route::get('/roles/create', 'create')->name('roles.create');
        Route::post('/roles/create', 'store');
        Route::get('/role/update/{role}', 'edit')->name('roles.update');
        Route::post('/role/update/{role}', 'update');
        Route::get('/role/delete/{role}', 'destroy')->name('roles.delete');
    });

    Route::controller(PermissionController::class)->group(function () {
        Route::get('/permissions', 'index')->name('permissions');
        Route::get('/permissions/create', 'create')->name('permissions.create');
        Route::post('/permissions/create', 'store');
        Route::get('/permission/update/{permission}', 'edit')->name('permissions.update');
        Route::post('/permission/update/{permission}', 'update');
        Route::get('/permission/delete/{permission}', 'destroy')->name('permissions.delete');
    });





    Route::controller(CategoryController::class)->group(
        function () {
            Route::get('/products/categories', 'index')->name('categories');
            Route::get('/add/category', 'create')->name('category.create');
            Route::post('/add/category', 'store');
            Route::get('/category/{category}/edit', 'edit')->name('category.edit');
            Route::post('/category/{category}/edit', 'update');
            Route::get('/category/{category}/destroy', 'destroy')->name('category.destroy');


            // Sub Categories Section

        }
    );

    Route::controller(SubCategoryController::class)->group(
        function () {
            Route::get('/subcategories', 'index')->name('subcategories');
            Route::get('/add/subcategory', 'create')->name('subcategory.create');
            Route::post('/add/subcategory', 'store');
            Route::get('/subcategory/{category}/edit', 'edit')->name('subcategory.edit');
            Route::post('/subcategory/{category}/edit', 'update');
            Route::get('/subcategory/{category}/destroy', 'destroy')->name('subcategory.destroy');
        });

        Route::controller(VendorController::class)->group(
            function () {
                Route::get('/vendors', 'index')->name('vendors');
                Route::get('/add/vendor', 'create')->name('vendor.create');
                Route::post('/add/vendor', 'store');
                Route::get('/vendor/{vendor}/edit', 'edit')->name('vendor.edit');
                Route::post('/vendor/{vendor}/edit', 'update');
                Route::get('/vendor/{vendor}/destroy', 'destroy')->name('vendor.destroy');
            });

    Route::controller(ProductController::class)->group(
        function () {
            Route::get('/products', 'index')->name('products');
            Route::get('/add/product', 'create')->name('product.create');
            Route::post('/add/product', 'store');
            Route::get('/product/{product}/edit', 'edit')->name('product.edit');
            Route::post('/product/{product}/edit', 'update');
            Route::get('/product/{product}/show', 'show')->name('product.show');
            Route::get('/product/{product}/destroy', 'destroy')->name('product.destroy');
        }
    );






});














<?php

use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Traits\LoadsTranslatedCachedRoutes;
use App\Http\Controllers\website\{MainController,ShopController,WebsiteSubCategoriesController};
use App\Http\Controllers\website\{WishlistController,CartController,WebsiteCategoriesController};
use App\Http\Controllers\dashboard\{DashboardMainController,CategoriesController,UsersController,SubCategoriesController,ProductsController};

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


// routes/web.php
Route::get('locale/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'ar'])) {
        abort(400);
    }
    session(['locale' => $locale]);
    return redirect()->back();
})->name('locale.switch');


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

        Auth::routes();

        Route::get('/', [App\Http\Controllers\website\MainController::class, 'home'])->name('home');
        Route::get('/shop', [App\Http\Controllers\website\ShopController::class, 'shop'])->name('shop');
        Route::get('/shop_single/{id}', [App\Http\Controllers\website\ShopController::class, 'shop_single'])->name('shop_single');
        Route::get('/shop/search', [ShopController::class, 'search'])->name('shop.search');
        Route::get('/catalog', [App\Http\Controllers\website\MainController::class, 'catalog'])->name('catalog');
        Route::get('/catalog/search', [MainController::class, 'catalogSearch'])->name('catalog.search');
        Route::get('/New-Arrivals', [App\Http\Controllers\website\MainController::class, 'new_arrivals'])->name('new.arrivals');
        Route::get('/about', [App\Http\Controllers\website\MainController::class, 'about'])->name('about');
        Route::get('/contact', [App\Http\Controllers\website\MainController::class, 'contact'])->name('contact');
        Route::get('/new-arrivals/search', [MainController::class, 'newArrivalsSearch'])->name('new.arrivals.search');
        Route::get('/website/subcategories/{id}', [App\Http\Controllers\website\WebsiteSubCategoriesController::class, 'index'])->name('website.subcategories');
        Route::get('/website/categories/{id}', [App\Http\Controllers\website\WebsiteCategoriesController::class, 'index'])->name('website.categories');

        Route::middleware(['auth'])->group(function () {
            Route::get('/profile', [MainController::class, 'profile'])->name('website.profile');
            Route::get('/profile/edit/{id}', [MainController::class, 'edit_profile'])->name('website.edit.profile');
            Route::post('/profile/update/{id}', [MainController::class, 'update_profile'])->name('website.update.profile');

            // cart
            Route::post('cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
            Route::get('cart', [CartController::class, 'showCart'])->name('cart.index');
            Route::delete('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
            Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
            //end cart

            // wish list
            Route::post('/wishlist/add/{product}', [WishlistController::class, 'add'])->name('wishlist.add');
            Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
            Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
            //end wishlist

        });



        Route::prefix('dashboard')->middleware(['auth', 'dashboard'])->group(function () {
            Route::get('/', [DashboardMainController::class, 'home'])->name('dashboard');
            Route::get('/profile', [UsersController::class, 'profile'])->name('profile');

            // users
            Route::get('/users/admin',[UsersController::class,'show_admins'])->name('show.admins');
            Route::get('/users/moderator',[UsersController::class,'show_moderators'])->name('show.moderators');
            Route::get('/users/customer',[UsersController::class,'show_customers'])->name('show.customers');
            Route::resource('/users',UsersController::class);

            Route::get('/user/delete' ,[UsersController::class,'delete'])->name('user.delete');
            Route::get('/user/restore/{id}' ,[UsersController::class,'restore'])->name('user.restore');
            Route::Delete('/user/forceDelete/{id}' ,[UsersController::class,'forcedelete'])->name('user.forcedelete');
            // end users

            // categories
            Route::get('/categories/search',[CategoriesController::class,'search'])->name('dashboard.search.categories');
            Route::resource('/categories',CategoriesController::class);
            //end categories

            // subcategories
            Route::get('/subcategories/search',[SubcategoriesController::class,'search'])->name('dashboard.search.subcategories');
            Route::resource('/subcategories',SubCategoriesController::class);
            //end subcategories

            // products
            Route::get('/products/search',[ProductsController::class,'search'])->name('dashboard.search.products');
            Route::resource('/products',ProductsController::class);
            //end products
        });


    });

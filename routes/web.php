<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ContractorApprovalController as AdminContractorApprovalController;
use App\Http\Controllers\Admin\ServiceCategoryController as AdminServiceCategoryController;
// Web Routes
Route::get(
    '/',
    fn() => view('screens.web.home.index', ['isHome' => true])
)->name('home');

Route::get(
    '/find-a-gym',
    fn() => view('screens.web.find-a-gym.index')
)->name('find-a-gym');

Route::get(
    '/about',
    fn() => view('screens.web.about.index')
)->name('about');

Route::get(
    '/become-a-host',
    fn() => view('screens.web.become-a-host.index')
)->name('become-a-host');

Route::get(
    '/how-it-works',
    fn() => view('screens.web.how-it-works.index')
)->name('how-it-works');

Route::get(
    '/contact',
    fn() => view('screens.web.contact.index')
)->name('contact');

Route::get(
    '/blog',
    fn() => view('screens.web.blog.index')
)->name('blog');

Route::get(
    '/book-now',
    fn() => view('screens.web.book-now.index')
)->name('book-now');

Route::get(
    '/cart',
    fn() => view('screens.web.cart.index')
)->name('cart');

Route::get(
    '/checkout',
    fn() => view('screens.web.checkout.index')
)->name('checkout');

Route::get(
    '/profile',
    fn() => view('screens.web.profile.index')
)->middleware('auth')->name('profile');

// admin routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
   
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::get('/memberships', [MembershipController::class, 'index'])->name('memberships.index');
    Route::middleware(['auth', 'company.approved'])->group(function () {
    });
    Route::middleware(['auth', 'admin.middleware'])->group(function () {
        Route::get('/users', [UsersController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    });
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/admin/users', [UsersController::class, 'ajaxToggle'])->name('admin.users.approval');
});


// auth routes



Route::get('/route-clear', function () {
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    $cache = 'Route cache cleared <br /> View cache cleared <br /> Cache cleared <br /> Config cleared <br /> Config cache cleared';
    return $cache;
});

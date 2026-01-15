<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\HostController as AdminHostController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GymController;

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

    // every user can access these pages dashboard 
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/orders', [OrderControlssler::class, 'index'])->name('orders.index');
    Route::post('/admin/users', [AdminUsersController::class, 'ajaxToggle'])->name('admin.users.approval');
    Route::get('/memberships', [MembershipController::class, 'index'])->name('memberships.index');

    // admin middleware
    Route::middleware(['auth', 'admin.middleware'])->group(function () {
        Route::get('/users', [AdminUsersController::class, 'index'])->name('users.index');
        Route::get('/users/create', [AdminUsersController::class, 'create'])->name('users.create');
        Route::post('/users', [AdminUsersController::class, 'store'])->name('users.store');
        Route::get('/hosts', [AdminHostController::class, 'index'])->name('hosts.index');
    });

    // hosts middleware
    Route::middleware(['auth', 'host.middleware'])->group(function () {
        Route::get('/gyms', [GymController::class, 'index'])->name('gyms.index');
        Route::get('/gyms/create', [GymController::class, 'create'])->name('gyms.create');
        Route::get('/gyms/edit', [GymController::class, 'edit'])->name('gyms.edit');

    });

    
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

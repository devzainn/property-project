<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SitePlanController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\NotaryController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\BookingLetterController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportSaleController;
use App\Models\Property;
use App\Models\ReportSale;
use GuzzleHttp\Middleware;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
});

Route::middleware(['auth', 'role:admin|marketing'])->group(function () {
    Route::controller(SitePlanController::class)->prefix('site_plans')->group(function () {
        Route::get('', 'index')->name('site_plans.index');
        Route::get('create', 'create')->name('site_plans.create');
        Route::post('store', 'store')->name('site_plans.store');
        Route::get('show/{id}', 'show')->name('site_plans.show');
        Route::get('edit/{id}', 'edit')->name('site_plans.edit');
        Route::put('edit/{id}', 'update')->name('site_plans.update');
        Route::delete('destroy/{id}', 'destroy')->name('site_plans.destroy');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(PropertyController::class)->prefix('properties')->group(function () {
        Route::get('', 'index')->name('properties.index');
        Route::get('create', 'create')->name('properties.create');
        Route::post('store', 'store')->name('properties.store');
        Route::get('show/{property_id}', 'show')->name('properties.show');
        Route::get('edit/{property_id}', 'edit')->name('properties.edit');
        Route::put('edit/{property_id}', 'update')->name('properties.update');
        Route::delete('destroy/{property_id}', 'destroy')->name('properties.destroy');
    });
});

Route::middleware(['auth', 'role:admin|marketing'])->group(function () {
    Route::controller(BuyerController::class)->prefix('buyers')->group(function () {
        Route::get('', 'index')->name('buyers.index');
    });
});

Route::middleware(['auth', 'role:admin|marketing'])->group(function () {
    Route::controller(BookingLetterController::class)->prefix('bookings-letter')->group(function () {
        Route::get('', 'index')->name('bookings-letter.index');
        Route::get('edit/{id}', 'edit')->name('bookings-letter.edit');
        Route::put('edit-update/{id}', 'update')->name('bookings-letter.update');
        Route::get('preview/{id}', 'preview')->name('bookings-letter.preview');
        Route::get('print/{id}', 'print')->name('bookings-letter.print');
        Route::delete('{id}', 'destroy')->name('bookings-letter.destroy');
    });
});

Route::middleware(['auth', 'role:admin|marketing'])->group(function () {
    Route::controller(ReportSaleController::class)->prefix('report-sales')->group(function () {
        Route::get('', 'index')->name('report-sales.index');
    });
});

Route::middleware(['auth', 'role:admin|marketing'])->group(function () {
    Route::controller(BookingController::class)->prefix('bookings')->group(function () {
        Route::get('', 'index')->name('bookings.index');
        Route::get('create', 'create')->name('bookings.create');
        Route::post('', 'store')->name('bookings.store');
        Route::post('store_buyer', 'storeBuyer')->name('bookings.store_buyers');
        Route::post('store_spouse', 'storeSpouse')->name('bookings.store_spouses');
        Route::get('show/{booking_id}', 'show')->name('bookings.show');
        Route::get('edit/{booking_id}', 'edit')->name('bookings.edit');
        Route::put('edit/{booking_id}', 'update')->name('bookings.update');
        Route::delete('{booking_id}', 'destroy')->name('bookings.destroy');
        Route::put('/bookings/{id}/accept', 'acceptBooking')->name('bookings.accept');
    });
});

Route::middleware(['auth', 'role:admin|manajer'])->group(function () {
    Route::controller(NotaryController::class)->prefix('notaries')->group(function () {
        Route::get('/', 'index')->name('notaries.index');
        Route::get('/create', 'create')->name('notaries.create');
        Route::post('/store', 'store')->name('notaries.store');
        Route::get('/edit/{notary_id}', 'edit')->name('notaries.edit');
        Route::put('/edit/{notary_id}', 'update')->name('notaries.update');
        Route::delete('/{notary_id}', 'destroy')->name('notaries.destroy');
    });
});

Route::middleware(['auth', 'role:admin|manajer'])->group(function () {
    Route::controller(BankController::class)->prefix('banks')->group(function () {
        Route::get('/', 'index')->name('banks.index');
        Route::get('/create', 'create')->name('banks.create');
        Route::post('/store', 'store')->name('banks.store');
        Route::get('/edit/{bank_id}', 'edit')->name('banks.edit');
        Route::put('/edit/{bank_id}', 'update')->name('banks.update');
        Route::delete('/{bank_id}', 'destroy')->name('banks.destroy');
    });
});

Route::group(['middleware' => ['role:admin|manajer']], function () {
    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('/', 'index')->name('users.index');
        Route::get('/create', 'create')->name('users.create');
        Route::post('/store', 'store')->name('users.store');
        Route::get('/edit/{user_id}', 'edit')->name('users.edit');
        Route::put('/edit/{user_id}', 'update')->name('users.update');
        Route::delete('/{user_id}', 'destroy')->name('users.destroy');
    });

});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(ArchiveController::class)->prefix('archives')->group(function () {
        Route::get('/', 'index')->name('archives.index');
        Route::get('/create', 'create')->name('archives.create');
        Route::post('/store', 'store')->name('archives.store');
        Route::get('/show/{id}', 'show')->name('archives.show');
        Route::get('/edit/{id}', 'edit')->name('archives.edit');
        Route::put('/edit/{id}', 'update')->name('archives.update');
        Route::delete('/{id}', 'destroy')->name('archives.destroy');
    });
});

<?php

declare(strict_types=1);

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SubscriptionCustomerController;
use App\Http\Controllers\PowerTestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', [HomePageController::class, 'index'])
    ->middleware('auth')
    ->name('homepage.index');

// Customers
Route::controller(CustomerController::class)
    ->middleware('auth')
    ->group(function (): void {
        Route::post('customers/find', 'find')->name('customer.find');
        Route::get('customers/tests/{customer}', 'getCustomerTreatment'
        )->name(
            'customers.tests'
        );
        Route::get(
            'customers/tests/detail/{customer}',
            'getCustomerTreatmentDetail'
        )->name('customers.tests.detail');
    });

Route::resource('customers', CustomerController::class)->middleware('auth');

// Iscrizioni
Route::resource('subscriptions', SubscriptionController::class)->middleware(
    'auth'
);

// Fornitori
Route::resource('vendors', VendorController::class)->middleware('auth');

// PowerTest-Clienti
Route::post('test/store', [PowerTestController::class, 'store'])
    ->middleware('auth')
    ->name('test.store');
Route::get('test/show/{test}', [PowerTestController::class, 'show'])
    ->middleware('auth')
    ->name('test.show');
Route::get('test/{customer}', [PowerTestController::class, 'index'])
    ->middleware('auth')
    ->name('test-customer.index');
Route::get('powerzone/{customer}', [PowerTestController::class, 'powerzone'])
    ->middleware('auth')
    ->name('customer.powerzone');
Route::get('test/edit/{test}', [PowerTestController::class, 'edit'])
    ->middleware('auth')
    ->name('test.edit');
Route::PATCH('test/update/{test}', [PowerTestController::class, 'update'])
    ->middleware('auth')
    ->name('test.update');
Route::delete('test/destroy/{test}', [PowerTestController::class, 'destroy'])
    ->middleware('auth')
    ->name('test.destroy');

//Account
Route::controller(AccountController::class)
    ->middleware('admin')
    ->group(function (){
        Route::get('account/{account}/edit/', 'edit')->name('account.edit');
    });
//Route::get('account/{account}/edit/',Edit::class)
//    ->name('account.edit')->middleware('admin');

//Abbonamenti clienti
Route::controller(SubscriptionCustomerController::class)->middleware('auth')
    ->group(function (): void {
        Route::get('customer/subscription/{customer}/index/',
            'index'
        )
            ->name('customer.subscription.index');
        Route::get('customer/subscription/{customer_id}/create/',
            'create'
        )
            ->name('customer.subscription.create');
        Route::get('customer/subscription/{subscriptionCustomer}/update/',
            'update'
        )
            ->name('customer.subscription.update');
        Route::get('allsub', 'getSubscriptionCustomers')
            ->name('allsub');
        //Under 30 days
        Route::get('allsubunder', 'getSubscriptionCustomersUnder')
            ->name('allsubunder');
    });

// users
Route::controller(UserController::class)
    ->middleware('auth')
    ->group(function (): void {
        Route::get('users/{user}/passwordchange', 'pswchange')->name(
            'users.passchange'
        );
        Route::patch('users/{user}/passwordchange', 'updatepsw')->name(
            'users.updpsw'
        );
    });

Route::resource('users', UserController::class)->middleware('admin');


Auth::routes();

Route::get('/', function (){
    return view('welcome');
})->name('welcome');

//Workout
Route::controller(WorkoutController::class)
    ->middleware('auth')
    ->group(function (): void {
        Route::get('workouts/create', 'create')->name(
            'workouts.create'
        );
    });

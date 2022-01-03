<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ManageBookingController;
use App\Http\Controllers\ManageUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TrackingController;
use App\Http\Livewire\Admin\ShowPayments;
use App\Http\Livewire\CustomerBooking;
use App\Http\Livewire\ManageTask;
use App\Http\Livewire\ShowCompletedTasks;
use App\Http\Livewire\ShowContactMessages;
use App\Http\Livewire\StripePayment;

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

//foo
// Route::get('/foo', function () {
//     Artisan::call('storage:link');
// });

//Static Pages
Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/service', [PagesController::class, 'service'])->name('service');
Route::get('/blog', function () {
    return redirect('/en/blog');
})->name('blog');


//Contact
Route::post('/contact', [ContactController::class, 'storeContactForm'])->name('contact-form.store');

//Approval
Route::middleware(['auth'])->group(function () {
    Route::get('/approval', [PagesController::class, 'approval'])->name('approval');
});

//Dashboards and Blog
Route::middleware(['approved'])->group(function () {
    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
});

//Track order/Booking
Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking');
Route::get('/tracking/{code}', [TrackingController::class, 'tracking'])->name('trackWithCode');
Route::get('/track', [TrackingController::class, 'search'])->name('search');


//ADMIN Routes
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    //Manage User
    Route::resource('/users', ManageUserController::class);
    //Manage Booking
    Route::resource('/bookings', ManageBookingController::class);
    //Messages
    Route::get('/messages', [ShowContactMessages::class, 'render'])->name('messages');
    //Payments
    Route::get('/payments', [ShowPayments::class, 'render'])->name('payments');
    //Setting
    Route::get('setting', function () {
        return view('admin.setting');
    })->name('setting');
});

//Driver Routes
Route::group(['middleware' => ['auth', 'role:driver', 'approved']], function () {
    Route::get('/driver/tasks', ManageTask::class)->name('tasks');
    Route::get('/driver/all-task', ShowCompletedTasks::class)->name('completedTasks');
});

//Customer Routes
Route::group(['middleware' => ['auth', 'role:customer', 'approved']], function () {
    Route::get('customer/booking', CustomerBooking::class)->name('cbooking');
});


//Stripe
Route::get('/pay-stripe', StripePayment::class)->name('pay-stripe');



//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Re-optimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

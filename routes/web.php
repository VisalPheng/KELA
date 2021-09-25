<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\VenueProfileController;
use App\Http\Controllers\VenueOwnerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\VenueTimeSlotsController;
use App\Http\Controllers\TimeSlotsController;
use App\Http\Controllers\VenueAdminController;
use App\Http\Controllers\UserMiddlewareController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\VenueBookingController;
use App\Http\Controllers\EventsandOffersController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationsController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);
Auth::routes();

// Home //
Route::get('/', [HomeController::class, 'home'])->name('home.venue');
Route::get('/venues', [HomeController::class, 'venues'])->name('home.allvenues');
Route::get('/venues/locations/{id}', [HomeController::class, 'sortLocation'])->name('home.sortLocation');
Route::get('/{id}/detailpage', [HomeController::class, 'detailpage'])->name('home.detailpage');
Route::get('/{id}/booking', [BookingController::class, 'createBooking'])->name('createBooking');
Route::post('/booking/store',[BookingController::class,'store'])->name('storeBooking');
Route::get('/mybooking', [UserMiddlewareController::class, 'mybooking'])->name('home.mybooking');
Route::get('/myprofile', [UserMiddlewareController::class, 'userprofile'])->name('home.myprofile');
Route::post('/userprofile/update/{id}', [UserProfileController::class, 'update'])->name('userprofile.update');
Route::post('/userprofile/updatePassword/{id}', [UserProfileController::class, 'updatePassword'])->name('userprofile.updatePassword');
Route::get('/mybooking/receipt/{id}', [UserMiddlewareController::class, 'MyReceipt'])->name('mybooking.receipt');
Route::get('/registerconfirmation', [HomeController::class, 'registerconfirmation'])->name('registerconfirmation');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::delete('/mybooking/cancel/{id}', [BookingController::class, 'BookingCancel'])->name('BookingCancel');
Route::get('/{id}/eventandoffer', [HomeController::class, 'eventandoffer'])->name('home.eventandoffer');
Route::post('/message/store', [ContactUsController::class, 'store'])->name('home.storemessage');
//


// Admin Dashboard//
Route::group(['prefix' => 'admin', 'middleware' => ['role:Super Admin']], function() {
    Route::get('/', [AdminController::class, 'admin'])->name('admin.dashboard');
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');
    Route::post('/profile/update/{id}', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::post('/profile/updatePassword/{id}', [AdminProfileController::class, 'updatePassword'])->name('admin.profile.updatePassword');
    Route::resource('roles', RoleController::class, ['names' => 'admin.roles']);
    Route::resource('users', UserController::class, ['names' => 'admin.users']);
    Route::resource('locations', LocationsController::class, ['names' => 'admin.locations']);
    Route::resource('venues', VenueAdminController::class, ['names' => 'admin.venues']);
    Route::resource('timeslots', TimeSlotsController::class, ['names' => 'admin.timeslots']);
    Route::resource('bookings', BookingController::class, ['names' => 'admin.booking']);
    Route::resource('eventsandoffers', EventsandOffersController::class, ['names' => 'admin.eventsandoffers']);
    Route::resource('partners', PartnerController::class, ['names' => 'admin.partners']);
    Route::resource('faqs', FAQController::class, ['names' => 'admin.faqs']);
    Route::resource('contactus', ContactUsController::class, ['names' => 'admin.contactus']);
    Route::get('/bookings', [BookingController::class, 'listAllBooking'])->name('admin.booking.all');
    Route::get('/bookings/receipt/{id}', [BookingController::class, 'BookingReceipt'])->name('admin.booking.receipt');
    Route::get('/bookings/exportxlsx/', [BookingController::class, 'BookingExportXLSX'])->name('admin.booking.exportxlsx');
    Route::get('/bookings/exportcsv/', [BookingController::class, 'BookingExportCSV'])->name('admin.booking.exportcsv');
    Route::get('/booking/reserved/',[BookingController::class,'createReservedBooking'])->name('admin.booking.createReservedBooking');
    Route::post('/booking/reserved/store',[BookingController::class,'storeReservedBooking'])->name('admin.booking.store');
});
//

// Venues Owner Dashboard//
Route::group(['prefix' => 'venuedashboard', 'middleware' => ['role:Venue Owner|Super Admin']], function() {
    Route::get('/', [VenueOwnerController::class, 'dashboard'])->name('venuedashboard.dashboard');
    Route::get('/profile', [VenueProfileController::class, 'index'])->name('venue.profile.index');
    Route::post('/profile/update/{id}', [VenueProfileController::class, 'update'])->name('venue.profile.update');
    Route::post('/profile/updatePassword/{id}', [VenueProfileController::class, 'updatePassword'])->name('venue.profile.updatePassword');
    Route::resource('venues', VenueController::class, ['names' => 'venuedashboard.venues']);
    Route::resource('timeslots', VenueTimeSlotsController::class, ['names' => 'venuedashboard.timeslots']);
    Route::resource('booking', VenueBookingController::class, ['names' => 'venuedashboard.booking']);
    Route::get('/bookings', [VenueBookingController::class, 'listAllBooking'])->name('venuedashboard.booking.all');
    Route::get('/bookings/receipt/{id}', [VenueBookingController::class, 'BookingReceipt'])->name('venuedashboard.booking.receipt');
    Route::get('/bookings/exportxlsx/', [BookingController::class, 'VenueBookingExportXLSX'])->name('venue.booking.exportxlsx');
    Route::get('/bookings/exportcsv/', [BookingController::class, 'VenueBookingExportCSV'])->name('venue.booking.exportcsv');
    Route::get('/createbooking/reserved/',[VenueBookingController::class,'createReservedBooking'])->name('venue.booking.create');
    Route::post('/createbooking/reserved/store',[VenueBookingController::class,'storeReservedBooking'])->name('venue.booking.store');
});
//

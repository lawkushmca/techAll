<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Employee\ProfileController;
use App\Http\Controllers\MediaContentController;
use App\Http\Controllers\AchievementsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Auth\Auth2FAController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about-us');
});
Route::get('/organizations', function () {
    return view('organizations');
});
Route::get('/locations', function () {
    return view('locations');
});

Route::get('/achievements', [AchievementsController::class, 'index'])->name('achievements.index');

//Route::get('/status', [RegisterController::class, 'registrationStatus'])->name('registration-status');

//contact us
Route::post('/contact-us', [ContactUsController::class, 'submitForm'])->name('contact-us.store');

//Auth::routes();

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'create'])->name('admin.store');

// Password Reset Routes
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/2fa/generate', [LoginController::class, 'sendOtp'])->name('2fa.generate');
Route::post('/2fa/verify', [LoginController::class, 'verify'])->name('2fa.verify');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// List members
    Route::get('/admin/members', [MemberController::class, 'index'])->name('admin.members.index');

// Create member
    Route::get('/member/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('/member/store', [MemberController::class, 'store'])->name('members.store');

    Route::get('/member/show/{id?}', [MemberController::class, 'show'])->name('members.show');

// Edit member
    Route::get('/member/{id}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('/member/{id}', [MemberController::class, 'update'])->name('members.update');

// Delete member
    Route::delete('/member/{id}', [MemberController::class, 'destroy'])->name('members.destroy');

    Route::get('/admin/configuration', [MediaContentController::class, 'index'])->name('admin.media-contents.index');

    Route::get('/admin/configuration/page', [MediaContentController::class, 'getPageContents'])->name('admin.media-contents.pages');
    Route::get('/admin/configuration/upload', [MediaContentController::class, 'create'])->name('admin.media-contents.create');
    Route::post('/admin/configuration/store', [MediaContentController::class, 'store'])->name('admin.media-contents.store');
// Add more routes for updating and deleting media content

    Route::get('/admin/configuration/edit/{id}', [MediaContentController::class, 'edit'])->name('admin.media-contents.edit');
    Route::put('/admin/configuration/update/{id}', [MediaContentController::class, 'update'])->name('admin.media-contents.update');
    Route::delete('/admin/configuration/delete/{id}', [MediaContentController::class, 'delete'])->name('admin.media-contents.delete');

    //admin can cancel meeting

    Route::post('/event/{id}/cancel', [EventsController::class, 'cancelEvent'])->name('event.cancel');
    Route::get('/admin/member/meetings', [EventsController::class, 'getEventHistory'])->name('event.history');

    Route::get('/admin/contact-us', [ContactUsController::class, 'index'])->name('admin.contact-us.index');

});

Route::middleware(['auth'])->group(function () {

    Route::get('/meetings', [EventsController::class, 'index'])->name('events.index');
    Route::get('/meeting/create', [EventsController::class, 'create'])->name('event.create');
    Route::post('/meeting/store', [EventsController::class, 'store'])->name('event.store');
    Route::get('/meeting/edit', [EventsController::class, 'edit'])->name('event.edit');
    Route::post('/meeting/update', [EventsController::class, 'update'])->name('event.update');

//    Route::get('/events', [EventsController::class, 'index'])->name('events.index');
//    Route::get('/event/create', [EventsController::class, 'create'])->name('member.event.create');

});

Route::middleware(['auth', 'employee'])->group(function () {
    //Route::get('/member/events', [MeetingController::class, 'index'])->name('meeting.index');
    // Route::get('/member/event/create', [EventsController::class, 'create'])->name('member.event.create');

});


<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultainController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Mail\ConfirmAppointmentMail;
use App\Mail\RejectAppointmentMail;
use App\Mail\SubmitAppointmentMail;
use App\Models\Appointment;
use App\Models\Info;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services/{service:slug}', [PageController::class, 'service'])->name('service');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/appointment', [PageController::class, 'appointment'])->name('appointment');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/resources', [PageController::class, 'resources'])->name('resources');

Route::post('/message', [MessageController::class, 'store'])->name('message.store');

Route::get('/api/appointment/service/{service}', [PageController::class, 'appointmentConsultain']);
Route::get('/api/appointment/consultain/{consultain}', [PageController::class, 'consultainSchedule']);
Route::get('/api/appointment/preview', [PageController::class, 'appointmentPreview'])->name('appointment.preview');
Route::get('/api/appointment/confirm', [PageController::class, 'appointmentConfirm'])->name('appointment.confirm');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/update', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{user}', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('/profile/appointments', [ProfileController::class, 'appointments'])->name('profile.appointments');
    Route::put('/profile/appointments/cancel/{appointment}', [AdminPageController::class, 'appointmentCancel'])->name('profile.appointments.cancel');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/forgot-password', [AuthController::class, 'resetReq'])->name('reset-req');
    Route::post('/reset-request', [AuthController::class, 'resetPost'])->name('reset-post');
    Route::get('/reset-password', [AuthController::class, 'resetPassword'])->name('reset-password');
    Route::post('/reset-password', [AuthController::class, 'resetPasswordStore'])->name('reset-store');
});

Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminPageController::class, 'admin'])->name('index');
    Route::get('/dashboard', [AdminPageController::class, 'dashboard'])->name('dashboard');

    Route::resource('/services', ServiceController::class)
        ->except(['show'])->names('services');

    Route::resource('/resources', ResourceController::class)
        ->except(['show'])->names('resources');

    Route::resource('/consultains', ConsultainController::class)
        ->names('consultains');

    Route::post('/consultains/{consultain}/schedules', [ConsultainController::class, 'schedulesStore'])->name('consultains.schedules.store');
    Route::delete('/consultains/schedules/{schedule}', [ConsultainController::class, 'schedulesDelete'])->name('consultains.schedules.destroy');

    Route::get('/appointments', [AdminPageController::class, 'appointments'])->name('appointments.index');
    Route::get('/appointments/{appointment}', [AdminPageController::class, 'appointmentShow'])->name('appointments.show');
    Route::put('/appointments/{appointment}', [AdminPageController::class, 'appointmentUpdate'])->name('appointments.update');
    Route::put('/appointments/cancel/{appointment}', [AdminPageController::class, 'appointmentCancel'])->name('appointments.cancel');
    Route::put('/appointments/approve/{appointment}', [AdminPageController::class, 'appointmentApprove'])->name('appointments.approve');
    Route::put('/appointments/reject/{appointment}', [AdminPageController::class, 'appointmentReject'])->name('appointments.reject');

    Route::get('/home-page', [AdminPageController::class, 'homePage'])->name('home');
    Route::post('/home-page', [AdminPageController::class, 'homePageUpdate'])->name('home.update');

    Route::get('/about-page', [AdminPageController::class, 'aboutPage'])->name('about');
    Route::post('/page-update', [AdminPageController::class, 'aboutPageUpdate'])->name('page.update');

    Route::get('/pages/{page:slug}', [AdminPageController::class, 'page'])->name('pages');
    Route::put('/pages/update/{page:slug}', [AdminPageController::class, 'pageUpdate'])->name('pages.update');

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'delete'])->name('users.destroy');

    Route::get('/admins', [AdminController::class, 'admins'])->name('admins');
    Route::put('/admins/{user}', [AdminController::class, 'update'])->name('update');
    Route::delete('/admins/destroy/{user}', [AdminController::class, 'destroy'])->name('destroy');
    Route::get('/admins/add', [AdminController::class, 'create'])->name('admins.add');
    Route::get('/admins/add/confirm', [AdminController::class, 'confirm'])->name('admins.add.confirm');
    Route::put('/admins/add/confirm/{user}', [AdminController::class, 'toggleAdmin'])->name('admins.add.confirm.toggle');

    Route::get('/messages', [MessageController::class, 'index'])->name('messages');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');

    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/profile/{user}', [AdminController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update/{user}', [AdminController::class, 'updateProfile'])->name('profile.update');

    Route::get('/password', [AdminController::class, 'password'])->name('profile.password');
    Route::put('/password/{user}', [AdminController::class, 'changePassword'])->name('profile.password.update');

    Route::get('/settings', [AdminPageController::class, 'settings'])->name('settings');
    Route::post('/settings-update', [AdminPageController::class, 'settingUpdate'])->name('settings.update');
    Route::post('/settings-media-update', [AdminPageController::class, 'settingMediaUpdate'])->name('settings.media.update');
});


Route::get('/test', function() {
    $appointment = Appointment::first();
    $info = Info::first();
    // return view('emails.appointment-reject', compact('appointment', 'info'));
    Mail::to('mrdev774@gmail.com')->send(new RejectAppointmentMail($appointment));

    return "Email Sent";
});
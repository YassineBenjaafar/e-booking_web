<?php

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

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    //Auth Admin
    Route::namespace('Auth')->group(function(){
        
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login')->name('login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Register Routes
        Route::get('/register','RegisterController@showRegistrationForm')->name('register');
        Route::post('/register','RegisterController@register')->name('register');

        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

        // Email Verification Route(s)
        Route::get('email/verify','VerificationController@show')->name('verification.notice');
        Route::get('email/verify/{id}','VerificationController@verify')->name('verification.verify');
        Route::get('email/resend','VerificationController@resend')->name('verification.resend');

    });
    Route::get('/', function () {
        return view('welcome');
    });
    Route::resource('centers','CenterController')->middleware('roles:superadmin,admin');
    //
    Route::resource('clients','ClientController')->middleware('roles:superadmin');
    //
    Route::get('agendas/{entity}/edit','AgendaController@edit')->name('agendas.edit')->middleware('roles:superadmin,admin');
    Route::post('agendas/{entity}','AgendaController@update')->name('agendas.update')->middleware('roles:superadmin,admin');
    //
    Route::resource('entities','EntityController')->middleware('roles:superadmin,admin');
    //
    Route::get('employees/{employee}/account','EmployeeController@account')->name('employees.account')->middleware('roles:superadmin,admin');
    Route::resource('employees','EmployeeController',['parameters' => ['employees' => 'employee']])->middleware('roles:superadmin,admin');
    //
    Route::resource('roles','RoleController')->middleware('roles:superadmin');
    //
    Route::resource('users','UserController')->middleware('roles:superadmin');
    //
    Route::resource('tickets','TicketController')->middleware('roles:superadmin,admin');
    //
    Route::post('employee/setuser','EmployeeController@setUser')->name('Employee.setuser')->middleware('roles:superadmin,admin');  
    //
    Route::get('home','HomeController@index')->name('home')->middleware('roles:superadmin,admin,user'); 
    //
    Route::get('bookings/{etat}','BookingController@index')->name('bookings.index')->middleware('roles:superadmin,admin,user');
    Route::get('bookings','BookingController@affect')->name('bookings.affect')->middleware('roles:superadmin,admin,user');
    Route::post('bookings','BookingController@changerHauteSaison')->name('season.change')->middleware('roles:superadmin,admin,user');
    Route::post('tickets/{ticket}/edit','TicketController@reply')->name('ticket.reply')->middleware('roles:superadmin,admin');
   
    
});

Route::namespace('Espace_client')->group(function () { 
    Auth::routes();
    Route::get('/','HomeController@index'); 
    Route::get('/compte','CompteController@getCompte')->middleware('auth');  
    Route::get('bookings/{center}/center/entities','BookingController@getEntitiesByCenter')->name('booking.center.entities')->middleware('auth');
    Route::get('bookings/{entity}/entity','BookingController@getEntity')->name('booking.entity')->middleware('auth');
    Route::Post('bookings/{entity}/entity','BookingController@send')->name('booking.send')->middleware('auth');
    Route::get('bookings','BookingController@getBookings')->name('bookings.Employee')->middleware('auth');
    Route::get('bookings/report/{booking}','BookingController@getReport')->name('booking.report')->middleware('auth');
    Route::delete('bookings/delete','BookingController@delete')->name('booking.delete')->middleware('auth');
    Route::put('bookings/update','BookingController@cancel')->name('booking.cancel')->middleware('auth');
    Route::post('clientTickets','TicketController@postTicket')->name('contact.postTicket')->middleware('auth');
    Route::post('sendFeedback','TicketController@sendFeedback')->name('feedback.send')->middleware('auth');
    Route::get('read/{notification}','TicketController@readNotification')->name('notification.read')->middleware('auth');
});

 








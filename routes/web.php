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
    Route::resource('centres','CentreController')->middleware('roles:superadmin,admin');
    //
    Route::resource('clients','ClientController')->middleware('roles:superadmin');
    //
    Route::get('agendas/{maison}/edit','AgendaController@edit')->name('agendas.edit')->middleware('roles:superadmin,admin');
    Route::post('agendas/{maison}','AgendaController@update')->name('agendas.update')->middleware('roles:superadmin,admin');
    //
    Route::resource('maisons','MaisonController')->middleware('roles:superadmin,admin');
    //
    Route::get('salaries/{salarie}/compte','SalarieController@compte')->name('salaries.compte')->middleware('roles:superadmin,admin');
    Route::resource('salaries','SalarieController',['parameters' => ['salaries' => 'salarie']])->middleware('roles:superadmin,admin');
    //
    Route::resource('roles','RoleController')->middleware('roles:superadmin');
    //
    Route::resource('users','UserController')->middleware('roles:superadmin');
    //
    Route::resource('tickets','TicketController')->middleware('roles:superadmin,admin');
    //
    Route::post('salarie/setuser','SalarieController@setUser')->name('salarie.setuser')->middleware('roles:superadmin,admin');  
    //
    Route::get('home','HomeController@index')->name('home')->middleware('roles:superadmin,admin,user'); 
    //
    Route::get('reservations/{etat}','ReservationController@index')->name('reservations.index')->middleware('roles:superadmin,admin,user');
    Route::get('reservations','ReservationController@affecter')->name('reservations.affecter')->middleware('roles:superadmin,admin,user');
    Route::post('reservations','ReservationController@changerHauteSaison')->name('saison.change')->middleware('roles:superadmin,admin,user');
    Route::post('tickets/{ticket}/edit','TicketController@reply')->name('ticket.reply')->middleware('roles:superadmin,admin');
   
    
});

Route::namespace('Espace_client')->group(function () { 
    Auth::routes();
    Route::get('/','HomeController@index'); 
    Route::get('/compte','CompteController@getCompte')->middleware('auth');  
    Route::get('reservations/{centre}/centre/maisons','ReservationController@getMaisonsByCentre')->name('reservation.centre.maisons')->middleware('auth');
    Route::get('reservations/{maison}/maison','ReservationController@getMaison')->name('reservation.maison')->middleware('auth');
    Route::Post('reservations/{maison}/maison','ReservationController@envoyer')->name('reservation.envoyer')->middleware('auth');
    Route::get('reservations','ReservationController@getReservations')->name('reservations.salarie')->middleware('auth');
    Route::get('reservations/report/{reservation}','ReservationController@getReport')->name('reservation.report')->middleware('auth');
    Route::delete('reservations/delete','ReservationController@supprimer')->name('reservation.supprimer')->middleware('auth');
    Route::put('reservations/update','ReservationController@annuler')->name('reservation.annuler')->middleware('auth');
    Route::post('clientTickets','TicketController@postTicket')->name('contact.postTicket')->middleware('auth');
    Route::post('sendFeedback','TicketController@sendFeedback')->name('feedback.send')->middleware('auth');
    Route::get('read/{notification}','TicketController@readNotification')->name('notification.read')->middleware('auth');

});

 








<?php

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
//Mails route
Route::post('/sendmail', function (\Illuminate\Http\Request $request, \Illuminate\Mail\Mailer $mailer) {
    $mailer
    ->to($request->input('adresses'))
    ->send(new \App\Mail\MyMail($request->input('email_body')));
    return redirect()->back();
})->name('sendmail');
//

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('/organizations', 'OrganizationsController@index');

// Pour le OrganizationsController
Route::resource('organizations', 'OrganizationsController');

// Pour le Campaign controller :
Route::resource('campaigns', 'CampaignsController');
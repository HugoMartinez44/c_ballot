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
  $emails_strDégueu = $request->input('adresses');
  $emails_strConverted1 = str_replace('"', '', $emails_strDégueu);
  $emails_strConverted2 = str_replace('[', '', $emails_strConverted1);
  $anonym_urlDégueu = $request->input('anonym_url');
  $anonym_urlConverted1 = stripslashes($anonym_urlDégueu);
  $anonym_urlConverted2 = str_replace('"', '', $anonym_urlConverted1);
  /* LOOOOL */
  
  $emails_array = explode(',', $emails_strConverted2);
  $anonym_url_array = explode(',', $anonym_urlConverted2);
  //On fait une boucle qui envoie un email par adresses.
  for($i = 0; $i < sizeof($emails_array); $i++) {
  $mailer
  ->to($emails_array[$i])
  ->send(new \App\Mail\MyMail($request->input('email_body'), $anonym_url_array[$i]));
  }
  return redirect('/success');
})->name('sendmail');
//

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/success', 'DashboardController@success');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/organizations', 'OrganizationsController@index');

// Pour le OrganizationsController
Route::resource('organizations', 'OrganizationsController');

// Pour le Campaign controller :
Route::resource('campaigns', 'CampaignsController');

Route::post('/data/organizations','DatatableController@getOrganizations')->name('dataProcessingOrga');

Route::post('/data/campaigns','DatatableController@getCampaigns')->name('dataProcessingCamp');
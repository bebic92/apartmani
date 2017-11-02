<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Actions Handled By Resource Controller

// Verb	       Path	                Action	     Route Name
// GET	      /photo	            index	     photo.index
// GET	      /photo/create	        create	     photo.create
// POST	      /photo	            store	     photo.store
// GET	      /photo/{photo}	    show	     photo.show
// GET	      /photo/{photo}/edit	edit	     photo.edit
// PUT/PATCH  /photo/{photo}	    update	     photo.update
// DELETE	  /photo/{photo}	    destroy	     photo.destroy


Route::get('/', function () {
    return view('home')->with('active');
});

Route::auth();
Route::resource('user', 'UserProfileController', ['except' =>['create', 'show','edit','update','destroy']]);
//dodano za prikazivanje svih apartmana
Route::get('property/all_apartments','PropertyController@all_propertys');
//dodano za prikazivanje svih apartmana prilikom unosa u serch labelu(grad, broj ljudi)
Route::get('property/all_apartments_search','PropertyController@search_all_propertys');
// dodano za prikaz svih oglasa pojedinog korisnika
Route::get('property/apartments','PropertyController@all_user_propertys');
//dodano za mogućnost prikaza pojedinog oglasa
Route::get('property/{id}/view','PropertyController@view_property');
Route::get('/contact','PropertyController@show_contact');
Route::resource('property', 'PropertyController', ['except' =>['create']]);
//dodano za spremanje slika
Route::post('property/addPhotos/{id}','PropertyController@addPhotos');
//dodano za spremanje komentara, smo logirani korisnik  smije dodati komentar
Route::post('property/addComment/{id}','PropertyController@addComment')->middleware('auth');
//dodano za brisanje slika
Route::delete('property/photo/delete/{id}','PropertyController@deletePhotos');

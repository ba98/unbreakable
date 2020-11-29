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
Route::group(['middleware' => 'auth', 'middleware' => 'verified'], function () {

    Route::get('/reply/store', 'CommentsController@replyStore')->name('reply.add');
    Route::get('/profile', 'PagesController@profile')->name('profile');
    Route::get('/discussions', 'PostsController@discussions')->name('discussions');
    Route::get('/pts/{id}/notifyCoach', 'PrivateTrainingSessionsController@notifyCoach');
    Route::get('/pts/{id}/notifyMember', 'PrivateTrainingSessionsController@notifyMember');
    Route::get('/pts/respond', 'PagesController@ptsRespond')->name('ptsRespond');

    Route::resource('posts', 'PostsController');
    Route::resource('comment', 'CommentsController');
    Route::resource('user', 'UsersController');
    Route::resource('wts', 'WeeklyTrainingSchedulesController');
    Route::resource('pts', 'PrivateTrainingSessionsController');

    Route::post('user/store', 'UsersController@store');
    Route::post('/comment/store', 'CommentsController@store')->name('comment.add');
    Route::post('user', 'UsersController@update_image')->name('updateImage');

    /* Route::get('/pts/{id}/notifyCoach', 'VehiclesController@notifyCoach');
    Route::get('/pts/{id}', 'PagesController@pts')->name('pts'); */
    });

    Route::get('/', function () {
        return view('home');
    });
    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/abu', 'PagesController@abu')->name('abu');
    Route::get('/admin/dashboard', 'PagesController@dash')->name('dash');
    Route::get('/admin/users', 'PagesController@manageUsers')->name('manageUsers');
    Route::get('/admin/pts', 'PagesController@managePTS')->name('managePTS');
    Route::get('/admin/wts', 'PagesController@manageWTS')->name('manageWTS');

Auth::routes(['verify' => true]);
Auth::routes();




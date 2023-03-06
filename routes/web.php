<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;

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

Route::group(['namespace' => 'App\Http\Controllers'], function() {

    # backend
    Route::group(['prefix' => 'request', 'as' => 'request.'], function() {
        
        # show current token
        Route::get('token', function () {
            return response()->json([
                'success' => true,
                'data' => [
                    'token' => csrf_token()
                ]
            ]);
        });

        # guest (not logged in yet)
        Route::group(['middleware' => ['guest']], function() {

            # register
            Route::group(['prefix' => 'register'], function() {

                # register admin
                Route::post(
                    'admin', 
                    'AuthController@register_admin'
                )
                ->name('register.admin');
            
                # register user
                Route::post(
                    '', 
                    'AuthController@register_user'
                )
                ->name('register.user');

            });
        
            # login
            Route::post(
                'login', 
                'AuthController@login'
            )
            ->name('login');

        });

        # user has logged in
        Route::group(['middleware' => ['auth']], function() {

            # me
            Route::get(
                'me', 
                'AuthController@me'
            )
            ->name('me');
        
            # logout
            Route::get(
                'logout', 
                'AuthController@logout'
            )
            ->name('logout');
            
            # product
            Route::group(['prefix' => 'product', 'as' => 'product.'], function() {
                
                # list all products
                Route::get(
                    '', 
                    'ProductController@show'
                )
                ->name('show');
                
                # get a product
                Route::get(
                    '{id}', 
                    'ProductController@show'
                )
                ->name('show.id');
                
                # add a new product
                Route::post(
                    '', 
                    'ProductController@store'
                )
                ->name('store')
                ->middleware('can:isAdmin');
                
                # updating a product
                Route::put(
                    '{id}', 
                    'ProductController@update'
                )
                ->name('update')
                ->middleware('can:isAdmin');
                
                # delete a product
                Route::delete(
                    '{id}', 
                    'ProductController@destroy'
                )
                ->name('destroy')
                ->middleware('can:isAdmin');

            });

        });
    });

    # frontend
    Route::group(['as' => 'dashboard.'], function() {
        
        # guest (not logged in yet)
        Route::group(['middleware' => ['guest']], function() {
            
            # login
            Route::get(
                '/login', 
                function () { 
                    $data = [ 'title' => 'Sign In' ];
                    return Inertia::render('Login', $data);
                }
            )
            ->name( 'login' );
            
        });
        
        # user has logged in
        Route::group(['middleware' => ['auth']], function() {
            
            $data = [
                'user' => auth('web')->user()
            ];
            
            # home
            Route::get(
                '',
                function () use ($data) {
                    $data = array_merge($data, [ 'title' => 'Home' ]);
                    return Inertia::render('Home', $data);
                }
            )
            ->name( 'home' );
            
        });
    });


});
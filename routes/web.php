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

//SHOP PAGE
Route::get('/', [
    'as' => 'home.index',
    'uses' => 'Shop\ShopController@index',
]);
Route::get('/category/{slug}/{id}', [
    'as' => 'category.product',
    'uses' => 'CategoryController@viewCategoryDetailByID'
]);


//SHOP CMS
Route::group(
    [
        'prefix' => 'cms'
    ],
    function () {
        Route::get('/', 'AdminController@loginAdmin');
        Route::post('/', 'AdminController@postLoginAdmin');


        Route::get('/home', function () {
            return view('home');
        });

        Route::prefix('admin')->group(function () {

            Route::prefix('categories')->group(function () {
                Route::get('/', [
                    'as' => 'categories.index',
                    'uses' => 'CategoryController@index',
                    'middleware' => 'can:list_category'
                ]);

                Route::get('/create', [
                    'as' => 'categories.create',
                    'uses' => 'CategoryController@create'
                ]);

                Route::post('/store', [
                    'as' => 'categories.store',
                    'uses' => 'CategoryController@store'
                ]);

                Route::get('/edit/{id}', [
                    'as' => 'categories.edit',
                    'uses' => 'CategoryController@edit'
                ]);

                Route::post('/update/{id}', [
                    'as' => 'categories.update',
                    'uses' => 'CategoryController@update'
                ]);

                Route::get('/delete/{id}', [
                    'as' => 'categories.delete',
                    'uses' => 'CategoryController@delete'
                ]);
            });

            Route::prefix('menus')->group(function () {
                Route::get('/', [
                    'as' => 'menus.index',
                    'uses' => 'MenuController@index',
                    'middleware' => 'can:list_menu'
                ]);
                Route::get('/create', [
                    'as' => 'menus.create',
                    'uses' => 'MenuController@create'
                ]);
                Route::post('/store', [
                    'as' => 'menus.store',
                    'uses' => 'MenuController@store'
                ]);
                Route::get('/edit/{id}', [
                    'as' => 'menus.edit',
                    'uses' => 'MenuController@edit'
                ]);

                Route::post('/update/{id}', [
                    'as' => 'menus.update',
                    'uses' => 'MenuController@update'
                ]);

                Route::get('/delete/{id}', [
                    'as' => 'menus.delete',
                    'uses' => 'MenuController@delete'
                ]);
            });

            Route::prefix('product')->group(function () {
                Route::get('/', [
                    'as' => 'product.index',
                    'uses' => 'ProductController@index'
                ]);
                Route::get('/create', [
                    'as' => 'product.create',
                    'uses' => 'ProductController@create'
                ]);
                Route::post('/store', [
                    'as' => 'product.store',
                    'uses' => 'ProductController@store'
                ]);
                Route::get('/edit/{id}', [
                    'as' => 'product.edit',
                    'uses' => 'ProductController@edit'
                ]);

                Route::post('/update/{id}', [
                    'as' => 'product.update',
                    'uses' => 'ProductController@update'
                ]);

                Route::get('/delete/{id}', [
                    'as' => 'product.delete',
                    'uses' => 'ProductController@delete'
                ]);
            });

            Route::prefix('slider')->group(function () {
                Route::get('/', [
                    'as' => 'slider.index',
                    'uses' => 'SliderController@index',
                    'middleware' => 'can:list_slider'
                ]);
                Route::get('/create', [
                    'as' => 'slider.create',
                    'uses' => 'SliderController@create',
                    'middleware' => 'can:add_slider'
                ]);

                Route::post('/store', [
                    'as' => 'slider.store',
                    'uses' => 'SliderController@store'
                ]);

                Route::get('/edit/{id}', [
                    'as' => 'slider.edit',
                    'uses' => 'SliderController@edit',
                    'middleware' => 'can:edit_slider'
                ]);

                Route::post('/update/{id}', [
                    'as' => 'slider.update',
                    'uses' => 'SliderController@update'
                ]);

                Route::get('/delete/{id}', [
                    'as' => 'slider.delete',
                    'uses' => 'SliderController@delete',
                    'middleware' => 'can:delete_slider'
                ]);
            });


            Route::prefix('setting')->group(function () {
                Route::get('/', [
                    'as' => 'setting.index',
                    'uses' => 'SettingController@index'
                ]);
                Route::get('/create', [
                    'as' => 'setting.create',
                    'uses' => 'SettingController@create'
                ]);
                Route::post('/store', [
                    'as' => 'setting.store',
                    'uses' => 'SettingController@store'
                ]);
                Route::get('/edit/{id}', [
                    'as' => 'setting.edit',
                    'uses' => 'SettingController@edit'
                ]);
                Route::post('/update/{id}', [
                    'as' => 'setting.update',
                    'uses' => 'SettingController@update'
                ]);
                Route::get('/delete/{id}', [
                    'as' => 'setting.delete',
                    'uses' => 'SettingController@delete'
                ]);
            });

            Route::prefix('user')->group(function () {
                Route::get('/', [
                    'as' => 'user.index',
                    'uses' => 'AdmindUserController@index'
                ]);
                Route::get('/create', [
                    'as' => 'user.create',
                    'uses' => 'AdmindUserController@create'
                ]);
                Route::post('/store', [
                    'as' => 'user.store',
                    'uses' => 'AdmindUserController@store'
                ]);
                Route::get('/edit/{id}', [
                    'as' => 'user.edit',
                    'uses' => 'AdmindUserController@edit'
                ]);
                Route::post('/update/{id}', [
                    'as' => 'user.update',
                    'uses' => 'AdmindUserController@update'
                ]);
                Route::get('/delete/{id}', [
                    'as' => 'user.delete',
                    'uses' => 'AdmindUserController@delete'
                ]);
            });

            Route::prefix('role')->group(function () {
                Route::get('/', [
                    'as' => 'role.index',
                    'uses' => 'AdminRoleController@index'
                ]);
                Route::get('/create', [
                    'as' => 'role.create',
                    'uses' => 'AdminRoleController@create'
                ]);
                Route::post('/store', [
                    'as' => 'role.store',
                    'uses' => 'AdminRoleController@store'
                ]);
                Route::get('/edit/{id}', [
                    'as' => 'role.edit',
                    'uses' => 'AdminRoleController@edit'
                ]);
                Route::post('/update/{id}', [
                    'as' => 'role.update',
                    'uses' => 'AdminRoleController@update'
                ]);
                Route::get('/delete/{id}', [
                    'as' => 'role.delete',
                    'uses' => 'AdminRoleController@delete'
                ]);
            });
        });

        Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
            Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
            Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
        });
    });




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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/','FrontController@index');
//Route::get('/home','FrontController@index');
Route::get('/blog-details/{id}', 'FrontController@blog_details') ;
Route::get('blog-by-category/{id}', 'FrontController@blog_by_category') ;
Route::get('/contact', 'FrontController@contact') ;
Route::get('/about', 'FrontController@about') ;
Route::get('search', 'FrontController@search') ;
Route::get('bloger-write', 'FrontController@bloger_write') ;
Route::post('bloger-save', 'FrontController@bloger_save') ;
Route::get('manage-self-blog', 'FrontController@manage_self_blog') ;
Route::get('unpublished-bloger-content/{id}', 'FrontController@unpublished_bloger_content') ;
Route::get('edit-bloger-content/{id}', 'FrontController@edit_bloger_content') ;
Route::post('update-bloger-content', 'FrontController@update_bloger_content') ;
Route::post('save-comments', 'FrontController@save_comments') ;







Route::get('/admin-panel','AdminController@index');
Route::post('/admin-login','AdminController@admin_login_check');



Route::get('/dashboard','SuperAdminController@index');
Route::get('/add-category','SuperAdminController@add_category');
Route::post('/save-category','SuperAdminController@save_category');
Route::get('/manage-category','SuperAdminController@manage_category');
Route::get('/unpublished-category/{id}', 'SuperAdminController@unpublished_category') ;
Route::get('/published-category/{id}', 'SuperAdminController@published_category') ;
Route::get('/delete-category/{id}', 'SuperAdminController@delete_category') ;
Route::get('/edit-category/{id}', 'SuperAdminController@edit_category') ;
Route::post('/update-category', 'SuperAdminController@update_category') ;



Route::get('/add-blog', 'SuperAdminController@add_blog') ;
Route::post('/save-blog', 'SuperAdminController@save_blog') ;
Route::get('/manage-blog', 'SuperAdminController@manage_blog') ;
Route::get('/unpublished-blog/{id}', 'SuperAdminController@unpublished_blog') ;
Route::get('/published-blog/{id}', 'SuperAdminController@published_blog') ;
Route::get('/edit-blog/{id}', 'SuperAdminController@edit_blog') ;
Route::post('/update-blog', 'SuperAdminController@update_blog') ;
Route::get('/delete-blog/{id}', 'SuperAdminController@delete_blog') ;







Route::get('/manage-bloger-content', 'SuperAdminController@manage_bloger_content') ;
Route::get('/blog-verification/{id}', 'SuperAdminController@blog_verification') ;
Route::get('/delete-bloger-content/{id}', 'SuperAdminController@delete_bloger_content') ;












Route::get('/admin-logout','SuperAdminController@admin_logout');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

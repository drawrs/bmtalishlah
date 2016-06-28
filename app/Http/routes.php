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
Route::get('coba', function () {
// Update the user's profile...
    return redirect('tes')->with('status', 'Profile updated!');
});
Route::get('/tes', 'MainController@test');

Route::get('/uploader', function() {
    return view('upload');
});
Route::post('/simpen', [
    'uses' => 'MainController@upload',
    'as' => 'upload',
    'middleware' => 'web']);
Route::get('/', [
    'uses' => 'MainController@home',
    'as' => 'home'
    ]);
Route::get('/berita', [
    'uses' => 'NewsController@news',
    'as' => 'news'
    ]);
Route::get('/product', [
    'uses' => 'ProductController@products',
    'as' => 'products'
    ]);
Route::get('/berita/{tag}/{slug}.html', [
    'uses' => 'NewsController@viewNews',
    'as' => 'view.news'
    ]);
Route::get('/sejarah', [
    'uses' => 'ProfileController@sejarah',
    'as' => 'sejarah'
    ]);
Route::get('/visi-misi', [
    'uses' => 'ProfileController@visiMisi',
    'as' => 'visi.misi'
    ]);
Route::get('/struktur-organisasi', [
    'uses' => 'ProfileController@struktur',
    'as' => 'struktur.organisasi'
    ]);

Route::get('/gambar', function()
{
    $img = Image::make('foo.jpg')->resize(300, 200);

    return $img->response('jpg');
});
Route::auth();

Route::get('/home', 'HomeController@index');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [
        'uses' => 'AdminController@dashboard',
        'as' => 'dashboard'
        ]);
    Route::get('/dashboard/tambah-berita', [
        'uses' => 'NewsController@addNews',
        'as' => 'dashboard.add-news'
        ]);
    Route::get('/dashboard/tambah-produk', [
        'uses' => 'ProductController@addProduct',
        'as' => 'dashboard.add-product'
        ]);

    // Tambah tag
    Route::post('/dashboard/addtag', [
        'uses' => 'AdminController@add_tag',
        'as' => 'dashboard.add-tag'
        ]);
    // Hapus Tag
    Route::post('/dashboard/deltag', [
        'uses' => 'AdminController@delTag',
        'as' => 'dashboard.del-tag'
        ]);
    // Proses DB edit Berita
    Route::post('/dashboard/editnews', [
        'uses' => 'NewsController@news_edit',
        'as' => 'news.edit'
        ]);
    // Proses DB tambah Berita
    Route::post('/dashboard/addnews', [
        'uses' => 'NewsController@news_add',
        'as' => 'news.add'
        ]);
    // Proses DB hapus Berita
    Route::post('/dashboard/delnews', [
        'uses' => 'NewsController@news_del',
        'as' => 'news.del'
        ]);
    // Proses DB tambah produk
    Route::post('/dashboard/addproduct', [
        'uses' => 'ProductController@product_add',
        'as' => 'product.add'
        ]);
    // Proses DB edit Product
    Route::post('/dashboard/editproduct', [
        'uses' => 'ProductController@product_edit',
        'as' => 'product.edit'
        ]);
    // Proses DB hapus Produk
    Route::post('/dashboard/delproduct', [
        'uses' => 'ProductController@product_del',
        'as' => 'product.del'
        ]);
    // List News
    Route::get('/dashboard/daftar-berita', [
        'uses' => 'NewsController@listNews',
        'as' => 'dashboard.list-news'
        ]);
    // List Product
    Route::get('/dashboard/daftar-produk', [
        'uses' => 'ProductController@listProduct',
        'as' => 'dashboard.list-product'
        ]);
    // Form Edit News
    Route::get('/dashboard/edit-berita/{id}', [
        'uses' => 'NewsController@editNews',
        'as' => 'dashboard.edit-news'
        ]);
    // Form Edit Product
    Route::get('/dashboard/edit-produk/{id}', [
        'uses' => 'ProductController@editProduct',
        'as' => 'dashboard.edit-product'
        ]);
});

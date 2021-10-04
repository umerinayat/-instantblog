<?php

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/', 'PublicPostsController@index');
Route::get('/posts/{post}', 'PublicPostsController@show');
Route::post('/post/{id}/click', 'LikeController@likePost');

Route::get('/archives', 'PublicPostsController@archives');
Route::get('/archiveposts', 'PublicPostsController@archiveposts');
Route::get('/popular', 'PublicPostsController@popular');
Route::get('/categories', 'PublicTagsController@tags');
Route::get('/category/{tag}', 'PublicTagsController@index');

Route::get('/adminprofile', 'UserController@adminProfile');
Route::put('/adminprofile/{id}', 'UserController@adminUpdate');

Route::get('/profile/{username}', 'ProfileController@profile');
Route::get('/profile/{username}/edit', 'ProfileController@edit');
Route::put('/profile/{id}', 'ProfileController@update');

Route::get('/settings', 'SettingController@index');
Route::put('/settings/{id}', 'SettingController@update');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/add', 'HomeController@addpost');
Route::post('delete/content', 'HomeController@delcontent');
Route::post('/siteinstant', 'InstantController@siteCheck');
Route::get('/deactivate', 'InstantController@deactivatePage');
Route::get('/deactivation-result', 'InstantController@deactivateResult');
Route::post('/deactivateinstant', 'InstantController@deactivateScript');

Route::post('admincp/uploadImg', 'FileUploadController@postImage');
Route::post('admincp/deleteImg', 'FileUploadController@deleteFile');

Route::post('admincp/postEmbed', 'EmbedController@fetchEmbed');
Route::post('admincp/deleteEmbed', 'EmbedController@deleteEmbed');

Route::get('/facebook/facebook-rss', 'PublicPostsController@facebookShow');
Route::get('/posts/{post}/amp', 'PublicPostsController@ampShow');
Route::get('/page/{page}', 'PublicPostsController@showPage');
Route::get('/feed', 'PublicPostsController@feedControl');

Route::resource('/home', 'HomeController');
Route::resource('/users', 'UserController');
Route::resource('/cats', 'TagsController');
Route::resource('/pages', 'PageController');
Route::resource('/contents', 'PostsController');
Route::post('cnt/multiple', 'PostsController@multiple');

Route::get('/unpublished', 'PostsController@unpublished');

Route::get('/search', 'PublicPostsController@search');

Route::get('auth/{driver}', ['as' => 'socialAuth', 'uses' => 'Auth\LoginController@redirectToProvider']);
Route::get('auth/{driver}/callback', ['as' => 'socialAuth',
    'uses' => 'Auth\LoginController@handleProviderCallback']);

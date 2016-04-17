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


Route::get('/',[
    'uses'=>'PostController@getBlogIndex',
    'as'=>"blog.index"
]);
Route::get('/blog',[
    'uses'=>'PostController@getBlogIndex',
    'as'=>"blog.index"
]);
Route::get('/blog/{post_id}&{end}',[
    'uses'=>'PostController@getSinglePost',
    'as'=>"blog.single"
]);


// Autres routes

Route::get('/a-propos', function () {
    return view('frontend.autres.a-propos');
})->name('a-propos');
Route::get('/contact',[
    'uses'=>'ContactMessageController@getContactIndex',
    'as'=>"contact"
]);


Route::group([
    'prefix'=>'/admin'
],function(){
    Route::get('/',[
        'uses'=>'AdminController@getIndex',
        'as'=>"admin.index"
    ]);

    Route::get('/blog/posts/creation',[
        'uses'=>'PostController@getCreationPost',
        'as'=>"admin.blog.creation_post"
    ]);

    Route::get('/blog/posts',[
        'uses'=>'PostController@getPostIndex',
        'as'=>"admin.blog.index"
    ]);

    Route::get('/blog/post/{post_id}&{end}',[
        'uses'=>'PostController@getSinglePost',
        'as'=>"admin.blog.post"
    ]);

    Route::get('/blog/categories',[
        'uses'=>'CategorieController@getCategorieIndex',
        'as'=>"admin.blog.categories"
    ]);



    Route::post('/blog/post/creation',[
        'uses'=>'PostController@postCreationPost',
        'as'=>"admin.blog.post.creation"
    ]);

    Route::get('/blog/post/{post_id}/edit',[
        'uses'=>'PostController@getUpdatePost',
        'as'=>"admin.blog.post.editer"
    ]);

    Route::post('/blog/post/update',[
        'uses'=>'PostController@postUpdatePost',
        'as'=>"admin.blog.post.update"
    ]);

    Route::post('/blog/categories/update',[
        'uses'=>'CategorieController@postUpdateCategorie',
        'as'=>"admin.blog.categorie.update"
    ]);

    Route::post('/blog/categorie/creation',[
        'uses'=>'CategorieController@postCreationCategorie',
        'as'=>"admin.blog.categorie.creation"
    ]);

    Route::get('/blog/post/{post_id}/delete',[
        'uses'=>'PostController@getDeletePost',
        'as'=>"admin.blog.post.delete"
    ]);

    Route::get('/blog/categorie/{categorie_id}/delete',[
        'uses'=>'CategorieController@getDeleteCategorie',
        'as'=>"admin.blog.categorie.delete"
    ]);




});
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/add', function()
{
	return View::make('add');
});

Route::get('/book/{id}/edit', function($id)
{
	return View::make('edit', ['book' => Book::find($id)]);
});

Route::post('/book/{id}/edit', function($id)
{
	$book = Book::find($id);

	$bookData = Input::only('name');

	$book->fill($bookData);
	$book->update();

	$book->authors()->sync(Input::get('authors'));

	return View::make('edit', ['book' => Book::find($id)]);
});


Route::post('/add', function()
{
	$bookData = Input::only('name');

	$book = Book::create($bookData);

	$book->authors()->attach(Input::get('authors'));

	return Redirect::to('/book/'.$book->id);
});

Route::get('/authors', function()
{
	return Author::all();
});

Route::get('/books', function()
{
	return Book::all();
});


Route::get('/book/{id}', function($id)
{
	return Book::find($id);
});

Route::get('/book/{id}/authors', function($id)
{
	return Book::find($id)->authors;
});
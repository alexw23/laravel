@extends('layout')

@section('content')
	{{ Form::model($book) }}
		<h2>Book</h2>
		{{ Form::text('name') }}
		<h2>Authors</h2>
		<p>Hint: view current authors <a target="_BLANK" href="/book/{{ $book->id }}/authors/">here</a></p>
		@foreach(Author::all() as $author)
			{{ Form::checkbox('authors[]', $author->id) }} {{ $author->name }}
		@endforeach
	
		<p>
			{{ Form::submit() }}
		</p>
	{{ Form::close() }}
@stop
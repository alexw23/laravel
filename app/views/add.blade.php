@extends('layout')

@section('content')
	{{ Form::open() }}
		<h2>Book</h2>
		{{ Form::text('name') }}
		<h2>Authors</h2>
		@foreach(Author::all() as $author)
			{{ Form::checkbox('authors[]', $author->id) }} {{ $author->name }}
		@endforeach
	
		<p>
			{{ Form::submit() }}
		</p>
	{{ Form::close() }}
@stop
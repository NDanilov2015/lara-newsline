@extends('layouts.front')

@section('title', 'Отдельная новость')

@section('content')
	
	<h2>Полный текст отдельной новости</h2>
	
	<div class="col-md-12">
	<h2>{{ $post->name }}</h2>

	<div class="row">	
		<div class="col-md-12 border border-success">
			<p>{{ $post->description }}
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<a href="{!! action('PostsController@index') !!}">На главную</a>
			<span>&nbsp;|&nbsp;</span>
			<a href="{!! action('PostsController@catIndex', $category->slug) !!}">В родительскую категорию "{{ $category->catname }}"</a>
		</div>
	</div>
@endsection
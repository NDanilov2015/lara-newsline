@extends('layouts.front')

@section('title', 'Список новостей')

@section('content')
<div class="col-md-12">

<div>
	<span>Ещё один фильтр категорий, кроме левого меню -&gt;</span>
	
	@php
		$all_categories = \App\Category::all(); //Для левого меню
	@endphp

	<select name="another_filter" onchange="location = this.value;">
		<option value="{!! action('PostsController@index') !!}">Все новости</option>
	@foreach ($all_categories as $one_category)
		@php
			if (isset($category) && ($one_category->slug === $category->slug)) {
				$is_selected = "selected";
			} else {
				$is_selected = "";
			}
		@endphp
		<option value="{!! action('PostsController@catIndex', $one_category->slug) !!}" {{ $is_selected }}>{!! $one_category->catname !!}
		</option>
	@endforeach
	</select>
	
	
</div>

<div>
  @if(isset($category))
    <h2>Категория: {{ $category->catname }}</h2>
  @else
    <h2>Все новости</h2>
  @endif
</div>

<!-- Основной контент страницы -->
<div class="row">

<!-- Задача переключаться между видами -->
<div class="list-group">
  @forelse ($posts as $post)
	@php
		$category = $post->category()->first(); //Категория, специфичная для некоего поста
	@endphp
	<div class="list-group-item">
		<a href="{!! action('PostsController@show', [$category->slug, $post->slug]) !!}" target="_blank">
			<h4>{{ $post->name }}</h4>
		</a>
	</div>
  @empty
    <div class="list-group-item">Новостей нет</div>
  @endforelse
  
</div>

</div><!-- end div class row -->
</div>{{-- end div col-md-12 --}}

<script>window.__theme = 'bs4';</script>
@endsection
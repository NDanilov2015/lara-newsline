@extends('layouts.admin-posts')
@section('title', 'Все новости')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Все новости</h2>
		<a href="/manager" class="btn btn-info">Вернуться в главную панель</a>
	</div>
	
	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif
	
	@if (session('danger-operation'))
		<div class="alert alert-danger">
			{{ session('danger-operation') }}
		</div>
	@endif

	@if ($posts->isEmpty())
		<p>Новостей нет</p>
	@else
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Заголовок</th>
					<th>Slug</th>
					<th>Категория</th>
					<td>Создан</td>
					<th>Обновлен</th>
					<th>Действия</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($posts as $post)
				<tr>
					<td>{!! $post->id !!}</td>
					<td><a href="{!! action('Admin\ManagerPostsController@edit', $post->id) !!}">{!! $post->name !!}</a></td>
					<td>{!! $post->slug !!}</td>
					<td>{!! $post->category()->first()->catname !!}</td>
					<td>{!! $post->created_at !!}</td>
					<td>{!! $post->updated_at !!}</td>
					<td>
						<a href="{!! action('Admin\ManagerPostsController@edit', $post->id) !!}" class="btn btn-success">Правка</a>
						&nbsp;&nbsp;
						<a href="{!! action('Admin\ManagerPostsController@destroy', $post->id) !!}" class="btn btn-danger">Удалить</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		<a href="/manager" class="btn btn-info">Вернуться в главную панель</a>
	@endif

</div><!-- end panel-default -->

@endsection
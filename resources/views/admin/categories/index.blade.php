@extends('layouts.admin')
@section('title', 'Листинг категорий')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h2> Категории </h2>
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
	
	@if ($categories->isEmpty())
		<p>Нет категорий</p>
	@else
		<table class="table">
			<tbody>
			@foreach ($categories as $category)
				<tr>
					<td>{!! $category->catname !!}</td>
					<td><a href="{!! action('Admin\ManagerCategoriesController@edit', [$category->id]) !!}" class="btn btn-success">Правка</a></td>
					<td><a href="{!! action('Admin\ManagerCategoriesController@destroy', [$category->id]) !!}" class="btn btn-danger">Удалить</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>

	@endif

	
</div><!-- end panel-default -->

@endsection
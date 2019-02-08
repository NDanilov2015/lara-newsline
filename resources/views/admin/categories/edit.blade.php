@extends('layouts.admin')
@section('title', 'Редактирование категории')
@section('content')

<div class="container col-md-8 col-md-offset-2">
		<div class="well well bs-component">
			<form class="form-horizontal" method="post">
				
				@foreach ($errors->all() as $error)
					<p class="alert alert-danger">{{ $error }}</p>
				@endforeach
				
				@if (session('status'))
					<div class="alert alert-success">{{ session('status') }}</div>
				@endif
				
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				
				<fieldset>
					<legend>Редактировать категорию</legend>
					<div class="form-group">
						<label for="name" class="col-lg-2 control-label">Имя</label>
						<div class="col-lg-10">
						<input type="text" class="form-control" id="name" name="name" value="{{ $category->catname }}" required minlength="2" />
						</div>
					</div>
					
					<div class="form-group">
						<label for="slug" class="col-lg-2 control-label">URL Slug</label>
						<div class="col-lg-10">
						<input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}" required minlength="2" />
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<a href="/manager/categories" class="btn btn-danger">Отмена</a>
							<button type="submit" class="btn btn-success">Сохранить</button>
						</div>
					</div>

				</fieldset>
				
			</form>
		</div>
</div>

@endsection
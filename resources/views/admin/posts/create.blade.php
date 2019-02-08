@extends('layouts.admin-posts')
@section('title', 'Создать новость')
@section('content')

<a href="/manager" class="btn btn-info">Вернуться в главную панель</a>

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
			<legend>Создать новость</legend>

			<div class="form-group">
				<label for="name" class="col-lg-2 control-label">Имя</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" id="name" placeholder="Заголовок новости" name="name" required minlength="3" />
				</div>
			</div>
			
			<div class="form-group">
				<label for="slug" class="col-lg-4 control-label">URL Slug (транслит названия)</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" id="slug" name="slug" required minlength="2" />
				</div>
			</div>
			
			<div class="form-group">
				<label for="category_id" class="col-lg-2 control-label">Категория</label>
				<div class="col-lg-10">
					<select class="form-control" id="category_id" name="category_id">
						@foreach($categories as $category)
						<option value="{!! $category->id !!}">
							{!! $category->catname !!}
						</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="description" class="col-lg-2 control-label">Содержимое</label>
				<div class="col-lg-10">
					<textarea class="form-control" rows="10" id="description" name="description" required minlength="20"></textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					<a href="/manager/posts" class="btn btn-danger">Отмена</a>
					<button type="submit" class="btn btn-success">Создать</button>
				</div>
			</div>

		</fieldset>
			
	</form>
</div>
@endsection
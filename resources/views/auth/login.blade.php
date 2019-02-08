@extends('layouts.front')

@section('title', 'Please, login into!')

@section('content')
<div class="container col-md-6 col-md-offset-3">
	<div class="well well bs-component">
		<form class="form-horizontal" method="POST" action="/auth/login">
		
		@foreach ($errors->all() as $error)
			<p class="alert alert-danger">{{ $error }}</p>
		@endforeach
		
		{!! csrf_field() !!}
		
		<fieldset>
			<legend>Логин (admin/admin по дефолту)</legend>
			
			<div class="form-group">
				<label for="name" class="col-lg-6 control-label">Ваше имя</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
				</div>
			</div>
			
			<div class="form-group">
				<label for="password" class="col-lg-6 control-label">Ваш пароль</label>
				<div class="col-lg-10">
					<input type="password" class="form-control" name="password">
				</div>
			</div>
			
			<div class="checkbox">
				<label><input type="checkbox" name="remember">Запомнить меня?</label>
			</div>
			
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					<button type="submit" class="btn btn-success">Войти в админку</button>
				</div>
			</div>
			
		</fieldset>
		</form>
	</div>
</div>
@endsection
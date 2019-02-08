<html lang="en">

@include('partials.front.head')

<body style="width: 97%;">
  <!-- BEGIN CONTAINER -->
  <div class="container">

	<div class="row">

    <div class="col-md-12">
      <nav class="navbar navbar-expand-md bg-danger justify-content-between">
        <a href="/manager" class="navbar-brand text-white">Laravel NewsLine Админка</a>		
		<a href="/manager/logout" class="btn btn-info text-white">Выход</a>
      </nav>
    </div><!-- end col-md-12 of header line -->
	</div><!-- end row of header line -->
	  
    <div class="row mt-4">
		<!-- Пропущен блок с категориями итд чтобы не загромождать экран -->
		<div class="col-md-12">
			@yield('content')
        </div>

    </div><!-- end row -->

    </div>
<!-- END CONTAINER -->
</body>
</html>
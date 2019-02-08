<html lang="en">

@include('partials.front.head')

<body style="width: 97%;">
  <!-- BEGIN CONTAINER -->
  <div class="container">

   <div class="row">

    <div class="col-md-12">
      <nav class="navbar navbar-expand-md bg-success justify-content-between">
        <a href="/" class="navbar-brand text-white">Laravel NewsLine</a>
        {{--
		<form class="form-inline">
          <span class="fa fa-search bg-white"></span>
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
		--}}
		<a href="/auth/login" class="btn btn-danger text-white">Логин в админку</a>
      </nav>
    </div><!-- end col-md-12 of header line -->
 </div><!-- end row of header line -->
	
  
    <div class="row mt-4 ml-0 mr-0">
      
      <div class="col-md-4">
        @include('partials.front.leftmenu')
      </div>

      <div class="col-md-8">

        <!-- Page main content area -->
        <div class="row">
          @yield('content')
        </div>

      </div><!-- end col-md-10 -->

    </div>
  </div>
<!-- END CONTAINER -->
</body>
</html>
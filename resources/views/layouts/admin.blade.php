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
      
      <div class="col-md-6">
		<div class="list-group">					
			<div class="list-group-item">
				<div class="row-action-primary">
					<i class="material-icons">content_copy</i>
				</div>
				
				<div class="row-content">
					<div class="action-secondary"><i class="material-icons">border_color</i></div>
					<h4 class="list-group-item-heading">Управление новостями</h4>
					<a href="/manager/posts" class="btn btn-default btn-raised">Список новостей...</a>
					<br/>
					<a href="/manager/posts/create" class="btn btn-primary btn-raised">Создать новость...</a>
				</div>
				
			</div>
			
			<div class="list-group-separator"></div>
			
			<div class="list-group-item">
				<div class="row-action-primary">
					<i class="material-icons">format_list_bulleted</i>
				</div>
				
				<div class="row-content">
					<div class="action-secondary"><i class="material-icons">format_list_bulleted</i></div>
					<h4 class="list-group-item-heading">Управление категориями</h4>
					<a href="/manager/categories" class="btn btn-default btn-raised">Список категорий...</a>
					<br/>
					<a href="/manager/categories/create" class="btn btn-primary btn-raised">Создать категорию...</a>
				</div>
			</div>

			<div class="list-group-separator"></div>

			</div><!-- end list-group -->
		</div><!-- end col-md-4 -->
		
		<div class="col-md-6">
			@yield('content')
        </div>

    </div><!-- end row -->

    </div>
<!-- END CONTAINER -->
</body>
</html>
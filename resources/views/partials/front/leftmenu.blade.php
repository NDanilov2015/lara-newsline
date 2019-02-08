<h3>Категории</h3>

<ul class="nav flex-column">

 <li>
	<a href="/">Все новости</a>
 </li>

 @php
 	$categories = \App\Category::all(); //Для левого меню
 @endphp

 @foreach ($categories as $category)
	<li>
		<a href="{!! action('PostsController@catIndex', $category->slug) !!}">{!! $category->catname !!} </a>
	</li>
 @endforeach
  
</ul>
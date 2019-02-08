<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class PostsController extends Controller
{
    
	/**
	 * Листинг всех новостей
	 * Без категорий, но с возможностью их выбрать
	 * 
	 * @return \Illuminate\Http\Response
	 */
	public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
		
        return view('index', compact('posts'));
    }
	
	/**
	 * Листинг определенной категории
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function catIndex($category_slug)
	{
		$category = Category::whereSlug($category_slug)->firstOrFail();
		$posts = $category->posts()->orderBy('created_at', 'desc')->get();

		return view('index', compact('category', 'posts'));
	}
	
	/**
     * Отображает страницу конкретной статьи полностью
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function show($category_slug, $post_slug)
    {
		$category = Category::whereSlug($category_slug)->firstOrFail();
        $post = Post::whereSlug($post_slug)->firstOrFail();
		
		return view('show', compact('category', 'post'));
    }
}

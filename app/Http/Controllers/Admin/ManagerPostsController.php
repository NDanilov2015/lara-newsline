<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Category;
use App\Post;
use Carbon\Carbon;

class ManagerPostsController extends Controller
{
    /**
     * Листинг всех новостей с опцией редактирования.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Форма для создания новой новости.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Сохраняет вновь созданный пост в базе данных.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$now = Carbon::now()->toDateTimeString();
		
        $post = new Post(array( //И обращаемся к модели Post кстати
            'category_id' => $request->get('category_id'),
            'slug' => $request->get('slug'),
			'name' => $request->get('name'),
            'description' => $request->get('description'),
			'created_at' => $now,
			'updated_at' => $now
        ));
        $post->save();

        return redirect('/manager/posts/create')->with('status', 'Новость была создана! Не хотите ли создать ещё одну?');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Вызывает форму редактирования новости.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::whereId($id)->firstOrFail();
        $categories = Category::all();
		$category_selected = $post->category()->first();
		
        return view('admin.posts.edit', compact('post', 'categories', 'category_selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$now = Carbon::now()->toDateTimeString();
		
		$post = Post::find($id);
		$post->category_id = $request->get('category_id');
		$post->slug = $request->get('slug');		
		$post->name = $request->get('name');
		$post->description = $request->get('description');
		$post->updated_at = $now;
		$post->save();
		
        return redirect("/manager/posts")->with('status', 'Новость успешно отредактирована!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
		
        return redirect('/manager/posts')->with('danger-operation', 'Новость успешно удалена.');
    }
}

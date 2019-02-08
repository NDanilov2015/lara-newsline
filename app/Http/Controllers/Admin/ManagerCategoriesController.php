<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class ManagerCategoriesController extends Controller
{
    /**
     * Отображает список категорий.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
		return view('admin.categories.index', compact('categories'));
    }

    /**
     * Показывает форму для создания новой категории.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Сохраняет новую категорию в БД.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
        $category = new Category(array(
			'catname' => $request->get('name'),
			'slug' => $request->get('slug'),
		));
		
		$category->save();
		
		return redirect('/manager/categories/create')->with('status', 'Новая категория успешно создана - не желаете создать ещё?');
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
     * Вызов формы редактирования категории (имени, URL).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$category = Category::find($id);
		
		return view('admin.categories.edit', compact('category'));
    }

    /**
     * Обновляет запись в базе при редактировании.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
		$category->catname = $request->get('name');
		$category->slug = $request->get('slug');
		$category->save();
		
		return redirect('/manager/categories')->with('status', 'Категория успешно отредактирована и сохранена в базе данных!');
    }

    /**
     * Удаляет из базы категорию с $id и её новости.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		Category::destroy($id);
		
        return redirect('/manager/categories')->with('danger-operation', 'Категория успешно удалена со всеми её постами - Вы ещё пожалеете об этом!');
    }
}

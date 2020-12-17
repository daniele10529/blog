<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.post.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('backend.post.categories.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $category = new Category(array(
            'name_category' => $request->get('name_category'),
        ));
        $category->save();
        return redirect('/admin/categories/create')->with('status','Categoria inserita con successo');
    }
}

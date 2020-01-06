<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $category = new Category;
        $category->category1 = $request->category1;
        $category->standard1 = $request->standard1;
        $category->category2 = $request->category2;
        $category->standard2 = $request->standard2;
        $category->category3 = $request->category3;
        $category->standard3 = $request->standard3;
        $category->year = $request->year;
        $category->save();

        return redirect('/categories');
    }
    public function copy_create()
    {
        $copy_date = Category::orderBy('year','desc')->first();
        $category = new Category;
        $category->category1 = $copy_date->category1;
        $category->standard1 = $copy_date->standard1;
        $category->category2 = $copy_date->category2;
        $category->standard2 = $copy_date->standard2;
        $category->category3 = $copy_date->category3;
        $category->standard3 = $copy_date->standard3;
        $category->year = $copy_date->year +1;
        $category->save();
        return redirect('/categories');


    }
    public function index()
    {
        $columns = Category::all();
        return view('/admin/category/categories',[
            'columns' => $columns,
        ]);
    }
    public function show($id)
    {
        $category = Category::find($id);
        return view('/admin/category/edit_category',[
            'category' => $category,
        ]);
    }
    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->category1 = $request->category1;
        $category->standard1 = $request->standard1;
        $category->category2 = $request->category2;
        $category->standard2 = $request->standard2;
        $category->category3 = $request->category3;
        $category->standard3 = $request->standard3;
        $category->save();

        return redirect('/categories');
    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/categories');
    }
}

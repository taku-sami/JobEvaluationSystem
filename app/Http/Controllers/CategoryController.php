<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategoryYear;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $categoryyear =  new CategoryYear;
        $categoryyear->year = $request->year;
        $categoryyear->save();

        $names = $request->title;
        $standard = $request->standard;
        $n=0;
        foreach ($names as $item){
            $category = new Category;
            $category->year = $request->year;
            $category->category = $item;
            $category->standard = $standard[$n];
            $n++;
            $category->save();
        }

        return redirect('/categories');
    }
    public function index()
    {
        $columns = CategoryYear::all();
        return view('/admin/category/categories',[
            'columns' => $columns,
        ]);
    }
    public function create(Request $request)
    {
        $year = $request->year;
        return redirect()->route('add_category', ['year' => $year]);

//        return view('admin/category/add_category',[
//            'year' => $year,
//        ]);
    }
    public function show_add_category($year)
    {
        return view('/admin/category/add_category',[
            'year' => $year,
        ]);
    }

    public function show($id)
    {
        $categories = CategoryYear::find($id);
        return view('/admin/category/edit_category',[
            'categories' => $categories,
        ]);
    }
    public function update(Request $request)
    {
        $id= $request->id;
        $categories= $request->category;
        $standards= $request->standard;
        $n = 0;

        foreach ($id as $item) {
            $category = Category::find($item);
            $category->category = $categories[$n];
            $category->standard = $standards[$n];
            $category->save();
            $n++;
        }

        return redirect('/categories');
    }
    public function delete($id)
    {
        $category = CategoryYear::find($id);
        $category->category()->delete();
        $category->delete();
        return redirect('/categories');
    }
    public function add_category(Request $request)
    {

    }
}

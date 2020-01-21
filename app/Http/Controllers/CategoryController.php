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

        $names = $request->standard;
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
//    public function copy_create()
//    {
//        $copy_date = Category::orderBy('year','desc')->first();
//        $category = new Category;
//        $category->category1 = $copy_date->category1;
//        $category->standard1 = $copy_date->standard1;
//        $category->category2 = $copy_date->category2;
//        $category->standard2 = $copy_date->standard2;
//        $category->category3 = $copy_date->category3;
//        $category->standard3 = $copy_date->standard3;
//        $category->year = $copy_date->year +1;
//        $category->save();
//        return redirect('/categories');
//
//
//    }
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
        return view('admin/category/add_category',[
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

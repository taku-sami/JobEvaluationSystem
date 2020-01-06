<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    public function store(Request $request){
        $department = new Department;
        $department->dep_name = $request->dep_name;
        $department->save();

        return redirect('/department');
    }
    public function index()
    {
        $columns = Department::all();

        return view('/admin/department/department',[
            'columns' => $columns,
        ]);
    }
    public function show($id)
    {
        $department = Department::find($id);
        return view('/admin/department/edit_department',[
            'department' => $department,
        ]);
    }
    public function update(Request $request)
    {
        $department = Department::find($request->id);
        $department->dep_name = $request->dep_name;
        $department->save();
        return redirect('/department');

    }
    public function delete($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect('/department');
    }
}

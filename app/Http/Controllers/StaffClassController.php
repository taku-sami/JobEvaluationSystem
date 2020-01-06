<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffClass;

class StaffClassController extends Controller
{
    public function store(Request $request)
    {
//        $validate_rule = [
//            'class_name' => 'required',
//            'class_auth' => 'required',
//        ];
//        $this->validate($request, $validate_rule);

        $class = new StaffClass;
        $class->class_name = $request->class_name;
        $class->class_auth = $request->class_auth;
        $class->save();

        return redirect('/classes');
    }
    public function index()
    {
        $columns = StaffClass::all();

        return view('/admin/class/classes',[
            'columns' => $columns,
        ]);
    }
    public function show($id)
    {
        $class = StaffClass::find($id);
        return view('/admin/class/edit_class',[
            'class' => $class,
        ]);
    }
    public function update(Request $request)
    {
        $class = StaffClass::find($request->id);
        $class->class_name = $request->class_name;
        $class->class_auth = $request->class_auth;
        $class->save();
        return redirect('/classes');

    }
    public function delete($id)
    {
        $class = StaffClass::find($id);
        $class->delete();
        return redirect('/classes');
    }
}

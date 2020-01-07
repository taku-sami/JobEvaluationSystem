<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\StaffClass;
use App\Department;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->department = $request->department;
        $user->class = $request->class;

        $class_auth = StaffClass::where('class_name',$request->class)->first();
        $user->auth = $class_auth->class_auth;
        $user->password = Hash::make($request->password);
        if($request->image_url)
        {
            $user->image_url = $image = base64_encode(file_get_contents($request->image_url->getRealPath()));
//          $user->image_url = $request->image_url->storeAs('public/images', Carbon::now() . '_' . $request->name . '.jpg');
        }
        $user->save();

        return redirect('/employees');
    }
    public function index()
    {
        $columns = User::all();

        return view('/admin/employee/employees',[
            'columns' => $columns,
        ]);
    }
    public function showClassDep()
    {
        $classes = StaffClass::get();
        $departments = Department::get(['dep_name']);

        return view('admin/employee/add_employee')->with('classes',$classes)
            ->with('departments',$departments);
    }
    public function show($id)
    {
        $classes = StaffClass::get();
        $departments = Department::get(['dep_name']);
        $user = User::find($id);
        return view('/admin/employee/edit_employee',[
            'user' => $user,
        ])->with('classes',$classes)->with('departments',$departments);
    }
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->username;
        $user->email = $request->email;
        $user->department = $request->department;
        $user->class = $request->class;
        $class_auth = StaffClass::where('class_name',$request->class)->first();
        $user->auth = $class_auth->class_auth;
        if($request->image_url)
        {
            $user->image_url = $request->image_url->storeAs('public/images', Carbon::now() . '_' . $request->name . '.jpg');
        }
        $user->save();
        return redirect('/employees');

    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/employees');
    }
}

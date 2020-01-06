<?php

namespace App\Http\Controllers;

use App\Category;
use App\Department;
use App\Evaluation;
use App\Log;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $array_num =0;
        $user_dep = Auth::user()->department;
        $boss1_dep = User::where('department',$user_dep)
            ->where('auth','boss1')
            ->first();
        $boss2_dep = User::where('department',$user_dep)
            ->where('auth','boss2')
            ->first();

        foreach($categories as $category) {

            $check = $category->evaluation()->where('user_id', Auth::id())->first();
            if(empty($check) == true)
            {
                $columns[] = $categories[$array_num];
            }
            else{
                $columns[] = $category->evaluation()->where('user_id', Auth::id())->first();
            }
            $array_num++;
        }
        return view('staff/staff',[
            'columns' => $columns,
            'boss1_dep' => $boss1_dep,
            'boss2_dep' => $boss2_dep,
        ]);
    }
    public function regist($year)
    {
        $category = Category::where('year',$year)->first();
        return view('staff/detail',[
            'category' => $category,
        ]);
    }
    public function show($id)
    {
        $evaluation = Evaluation::where('id',$id)->first();
        return view('staff/check',[
            'evaluation' => $evaluation
        ]);
    }
    public function evaluation($id)
    {
        $evaluation = Evaluation::where('id', $id)->first();
        return view('staff/evaluation', [
            'evaluation' => $evaluation
        ]);
    }
    public function evaluation_regist(Request $request)
    {
        $evaluation = Evaluation::find($request->id);
        $evaluation->self_eva1 = $request->self_eva1;
        $evaluation->self_eva2 = $request->self_eva2;
        $evaluation->self_eva3 = $request->self_eva3;
        $evaluation->progress = 5;
        $evaluation->save();

        return redirect('/staff');
    }


    public function store(Request $request)
    {
        $evaluation = new Evaluation;
        $evaluation->goal_1 = $request->goal_1;
        $evaluation->goal_2 = $request->goal_2;
        $evaluation->goal_3 = $request->goal_3;
        $evaluation->progress = 2;
        $evaluation->user_id = $request->id;
        $evaluation->department = $request->department;
        $evaluation->year = $request->year;
        $evaluation->save();

        $log = new Log;
        $log->name = $request->name;
        $log->class = $request->class;
        $log->progress = "目標登録";
        $log->year = $request->year;
        $log->save();


        return redirect('/staff');
    }
    public function show_for_boss()
    {
        $department = Auth::user()->department;
        $year = Category::orderBy('year','desc')->first()->year;
        $users = User::where('department',$department)
            ->where('auth','staff')
            ->get();
        $array_num =0;
        foreach($users as $user) {
            $check = $user->eva_with_user()->where('year',$year)->first();
            if(empty($check) == true)
            {
                $columns[] = $users[$array_num];
//                $count[] = $users[$array_num];
            }
            else{
                $columns[] = $user->eva_with_user()->where('year',$year)->first();
            }
            $array_num++;
        }
        $num1 = 0;
        $num2 = 0;
        $num3 = 0;
        $num4 = 0;
        $num5 = 0;
        $num6 = 0;
        foreach($columns as $column){
            if($column->progress == null){$num1++;}
            elseif($column->progress == 1){$num1++;}
            elseif($column->progress == 2){$num2++;}
            elseif($column->progress == 3){$num2++;}
            elseif($column->progress == 4){$num3++;}
            elseif($column->progress == 5){$num4++;}
            elseif($column->progress == 6){$num5++;}
            elseif($column->progress == 7){$num6++;}
        }
        $none = 0;
        $count_ss = 0;
        $count_s = 0;
        $count_a = 0;
        $count_b = 0;
        $count_c = 0;
        foreach($columns as $column){
            if($column->evaluation == null){$none++;}
            elseif($column->evaluation == "SS"){$count_ss++;}
            elseif($column->evaluation == "S"){$count_s++;}
            elseif($column->evaluation == "A"){$count_a++;}
            elseif($column->evaluation == "B"){$count_b++;}
            elseif($column->evaluation == "C"){$count_c++;}
            elseif($column->evaluation = "未評価"){$none++;}
        }

        $categories = Category::all();
        $class_check = Auth::user()->auth;

        if($class_check == "boss1")
        {
            return view('boss/boss1',[
                'columns' => $columns,
                'year' => $year,
                'categories' => $categories,
                'num1' => $num1,
                'num2' => $num2,
                'num3' => $num3,
                'num4' => $num4,
                'num5' => $num5,
                'num6' => $num6,
                'none' => $none,
                'count_ss' => $count_ss,
                'count_s' => $count_s,
                'count_a' => $count_a,
                'count_b' => $count_b,
                'count_c' => $count_c,
            ]);
        }else{
            return view('boss/boss2',[
                'columns' => $columns,
                'year' => $year,
                'categories' => $categories,
                'num1' => $num1,
                'num2' => $num2,
                'num3' => $num3,
                'num4' => $num4,
                'num5' => $num5,
                'num6' => $num6,
                'none' => $none,
                'count_ss' => $count_ss,
                'count_s' => $count_s,
                'count_a' => $count_a,
                'count_b' => $count_b,
                'count_c' => $count_c,
            ]);
        }
    }

    public function show_for_boss_selected(Request $request)
    {
        $department = Auth::user()->department;
        $year = $request->year;
        $users = User::where('department',$department)
            ->where('auth','staff')
            ->get();
        $array_num =0;
        foreach($users as $user) {
            $check = $user->eva_with_user()->where('year',$year)->first();
            if(empty($check) == true)
            {
                $columns[] = $users[$array_num];
            }
            else{
                $columns[] = $user->eva_with_user()->where('year',$year)->first();
            }
            $array_num++;
        }
        $num1 = 0;
        $num2 = 0;
        $num3 = 0;
        $num4 = 0;
        $num5 = 0;
        $num6 = 0;
        foreach($columns as $column){
            if($column->progress == null){$num1++;}
            elseif($column->progress == 1){$num1++;}
            elseif($column->progress == 2){$num2++;}
            elseif($column->progress == 3){$num2++;}
            elseif($column->progress == 4){$num3++;}
            elseif($column->progress == 5){$num4++;}
            elseif($column->progress == 6){$num5++;}
            elseif($column->progress == 7){$num6++;}
        }
        $none = 0;
        $count_ss = 0;
        $count_s = 0;
        $count_a = 0;
        $count_b = 0;
        $count_c = 0;
        foreach($columns as $column){
            if($column->evaluation == null){$none++;}
            elseif($column->evaluation == "SS"){$count_ss++;}
            elseif($column->evaluation == "S"){$count_s++;}
            elseif($column->evaluation == "A"){$count_a++;}
            elseif($column->evaluation == "B"){$count_b++;}
            elseif($column->evaluation == "C"){$count_c++;}
            elseif($column->evaluation = "未評価"){$none++;}
        }

        $categories = Category::all();
        $class_check = Auth::user()->auth;
        if($class_check == "boss1")
        {
            return view('boss/boss1',[
                'columns' => $columns,
                'year' => $year,
                'categories' => $categories,
                'num1' => $num1,
                'num2' => $num2,
                'num3' => $num3,
                'num4' => $num4,
                'num5' => $num5,
                'num6' => $num6,
                'none' => $none,
                'count_ss' => $count_ss,
                'count_s' => $count_s,
                'count_a' => $count_a,
                'count_b' => $count_b,
                'count_c' => $count_c,
            ]);
        }else{
            return view('boss/boss2',[
                'columns' => $columns,
                'year' => $year,
                'categories' => $categories,
                'num1' => $num1,
                'num2' => $num2,
                'num3' => $num3,
                'num4' => $num4,
                'num5' => $num5,
                'num6' => $num6,
                'none' => $none,
                'count_ss' => $count_ss,
                'count_s' => $count_s,
                'count_a' => $count_a,
                'count_b' => $count_b,
                'count_c' => $count_c,
            ]);
        }
    }

    public function check_for_boss1($id)
    {
        $evaluation = Evaluation::where('id',$id)->first();
        $root = $evaluation->progress;

        return view('boss/check_boss1',[
            'evaluation' => $evaluation,
            'root' => $root
        ]);
    }
    public function eva_boss1($id)
    {
        $evaluation = Evaluation::where('id',$id)->first();
        $root = $evaluation->progress;

        return view('boss/eva_boss1',[
            'evaluation' => $evaluation,
            'root' => $root
        ]);
    }
    public function check_for_boss2($id)
    {
        $evaluation = Evaluation::where('id',$id)->first();
        $root = $evaluation->progress;

        return view('boss/check_boss2',[
            'evaluation' => $evaluation,
            'root' => $root
        ]);
    }
    public function eva_boss2($id)
    {
        $evaluation = Evaluation::where('id',$id)->first();
        $root = $evaluation->progress;

        return view('boss/eva_boss2',[
            'evaluation' => $evaluation,
            'root' => $root
        ]);
    }
    public function approval(Request $request)
    {
        $class = Auth::user()->auth;
        $evaluation = Evaluation::find($request->id);

        $log = new Log;
        $log->name = $request->name;
        $log->class = $request->class;
        $log->target_name = $request->target_name;
        $log->progress = "目標承認";
        $log->year = $request->year;
        $log->save();

        if ($class == 'boss1')
        {
            $evaluation->progress = 3;
            $evaluation->save();
        }elseif($class == 'boss2'){
            $evaluation->progress = 4;
            $evaluation->save();
        }
        return redirect('/boss');

    }
    public function denial(Request $request)
    {
        $evaluation = Evaluation::find($request->id);
        $evaluation->progress = 1;
        $evaluation->save();
        return redirect('/boss');
    }
    public function evaluation_boss(Request $request)
    {
        $class = Auth::user()->auth;
        $evaluation = Evaluation::find($request->id);
        if ($class == 'boss1')
        {
            $evaluation->boss1_eva1 =$request->boss1_eva1;
            $evaluation->boss1_eva2 =$request->boss1_eva2;
            $evaluation->boss1_eva3 =$request->boss1_eva3;
            $evaluation->progress = 6;
            $evaluation->save();
        }elseif($class == 'boss2'){
            $evaluation->boss2_eva1 =$request->boss2_eva1;
            $evaluation->boss2_eva2 =$request->boss2_eva2;
            $evaluation->boss2_eva3 =$request->boss2_eva3;
            $evaluation->progress = 7;
            $evaluation->save();


            $count =$evaluation->boss1_eva1+
                $evaluation->boss1_eva2+
                $evaluation->boss1_eva3+
                $evaluation->boss2_eva1+
                $evaluation->boss2_eva2+
                $evaluation->boss2_eva3;

            if($count>= 28){
                $evaluation->evaluation = "SS";
            }elseif($count>= 21){
                $evaluation->evaluation = "S";
            }elseif($count>= 14){
                $evaluation->evaluation = "A";
            }elseif($count>= 7){
                $evaluation->evaluation = "B";
            }elseif($count <= 6){
                $evaluation->evaluation = "C";
            }
            $evaluation->point = $count;
            $evaluation->save();

        }
        return redirect('/boss');

    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $department = Auth::user()->department;
        if(!empty($keyword))
        {
            $users = User::where('department',$department)
                ->where('name','like','%'.$keyword.'%')
                ->orWhere('email','like','%'.$keyword.'%')
                ->get();
        }else{
            $users = "";
        }
        return view('boss.result')->with('users',$users)
            ->with('keyword',$keyword);
    }
    public function show_staff($id)
    {
        $user = User::where('id',$id)->first();

        $categories = Category::all();
        $array_num =0;
        foreach($categories as $category) {

            $check = $category->evaluation()->where('user_id', $id)->first();
            if(empty($check) == true)
            {
                $columns[] = $categories[$array_num];
            }
            else{
                $columns[] = $category->evaluation()->where('user_id', $id)->first();
            }
            $array_num++;
        }
        return view('boss.staff')->with('user',$user)
            ->with('columns',$columns);

    }
    public function show_for_admin(){
        $bosses = User::where('auth','boss1')
            ->orwhere('auth','boss2')
            ->get();
        if(Category::all() === !null)
        {
            $year = Category::orderBy('year','desc')->first()->year;
            foreach($bosses as $boss){
                $columns[] = Evaluation::where('department',$boss->department)
                    ->where('year',$year)
                    ->get();
            }
        }else{
            $columns = null;
            $year = null;
        }

        $departments = Department::all();
        $categories = Category::all();
        $logs = Log::all();
        return view('admin/main',[
            'columns' => $columns,
            'departments' => $departments,
            'bosses' => $bosses,
            'year' => $year,
            'categories' => $categories,
            'logs' => $logs,
        ]);
    }
    public function show_for_admin_selected(Request $request)
    {
        $bosses = User::where('auth','boss1')
            ->orwhere('auth','boss2')
            ->get();
        $year = $request->year;
        $departments = Department::all();

        foreach($bosses as $boss){
            $columns[] = Evaluation::where('department',$boss->department)
                ->where('year',$year)
                ->get();
        }
        $categories = Category::all();
        $logs = Log::all();
        return view('admin/main',[
            'columns' => $columns,
            'departments' => $departments,
            'bosses' => $bosses,
            'year' => $year,
            'categories' => $categories,
            'logs' => $logs,
        ]);
    }
}


<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryYear;
use App\Department;
use App\Evaluation;
use App\Log;
use App\User;
use App\UserEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    public function index()
    {
        $categories = CategoryYear::all();
        $array_num =0;
        $user_dep = Auth::user()->department;
        $boss1_dep = User::where('department',$user_dep)
            ->where('auth','boss1')
            ->first();
        $boss2_dep = User::where('department',$user_dep)
            ->where('auth','boss2')
            ->first();

        $columns= array();
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
            'image' => Auth::user()->image,
            'boss1_dep' => $boss1_dep,
            'boss2_dep' => $boss2_dep,
        ]);
    }
    public function regist($year)
    {
        $category = CategoryYear::where('year',$year)->first();
        return view('staff/detail',[
            'category' => $category,
            'image' => Auth::user()->image,
        ]);
    }
    public function show($id)
    {
        $evaluation = UserEvaluation::where('id',$id)->first();
        return view('staff/check',[
            'evaluation' => $evaluation,
            'image' => Auth::user()->image,
        ]);
    }
    public function evaluation($id)
    {
        $evaluation = UserEvaluation::where('id', $id)->first();
        return view('staff/evaluation', [
            'evaluation' => $evaluation,
            'image' => Auth::user()->image,
        ]);
    }
    public function evaluation_regist(Request $request)
    {
        $user_evaluation = UserEvaluation::find($request->user_eva_id);
        $user_evaluation->progress = 5;
        $user_evaluation->save();

        $id = $request->id;
        $self_eva = $request->self_eva;
        $self_comment = $request->self_comment;
        $n = 1;
        foreach($id as $item) {
            $evaluation = Evaluation::find($item);
            $evaluation->self_eva = $self_eva[$n];
            $evaluation->self_comment = $self_comment[$n];
            $evaluation->save();
            $n++;
        }

        return redirect('/staff');
    }


    public function store(Request $request)
    {
        $user_eva = new UserEvaluation;
        $user_eva->year = $request->year;
        $user_eva->progress = 2;
        $user_eva->user_id = $request->id;
        $user_eva->user_name = $request->name;
        $user_eva->department = $request->department;
        $user_eva->save();

        $temp = UserEvaluation::where('user_id',$request->id)
            ->where('year',$request->year)
            ->first();
        $user_evaluation_id = $temp->id;

        $goals = $request->goal;
        $category_id = $request->category_id;
        $n=1;
        foreach($goals as $goal) {
            $evaluation = new Evaluation;
            $evaluation->goal = $goal;
            $evaluation->year = $request->year;
            $evaluation->user_id = $request->id;
            $evaluation->category_id = $category_id[$n];
            $evaluation->user_evaluation_id = $user_evaluation_id;
            $evaluation->save();
            $n++;
        }

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
        $year = CategoryYear::orderBy('year')->first()->year;
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

        $categories = CategoryYear::all();
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

        $categories = CategoryYear::all();
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
        $evaluation = UserEvaluation::where('id',$id)->first();
        $root = $evaluation->progress;

        return view('boss/check_boss1',[
            'evaluation' => $evaluation,
            'root' => $root,
            'image' => $evaluation->user->image,
        ]);
    }
    public function eva_boss1($id)
    {
        $evaluation = UserEvaluation::where('id',$id)->first();
        $root = $evaluation->progress;

        return view('boss/eva_boss1',[
            'evaluation' => $evaluation,
            'root' => $root,
            'image' => $evaluation->user->image,
        ]);
    }
    public function check_for_boss2($id)
    {
        $evaluation = UserEvaluation::where('id',$id)->first();
        $root = $evaluation->progress;

        return view('boss/check_boss2',[
            'evaluation' => $evaluation,
            'root' => $root,
            'image' => $evaluation->user->image,
        ]);
    }
    public function eva_boss2($id)
    {
        $evaluation = UserEvaluation::where('id',$id)->first();
        $root = $evaluation->progress;

        return view('boss/eva_boss2',[
            'evaluation' => $evaluation,
            'root' => $root,
            'image' => $evaluation->user->image,
        ]);
    }
    public function approval(Request $request)
    {

        $class = Auth::user()->auth;
        $evaluation = UserEvaluation::find($request->id);

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
        $evaluation = UserEvaluation::find($request->id);
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
            $user_evaluation = UserEvaluation::find($request->user_eva_id);
            $user_evaluation->progress = 6;
            $user_evaluation->save();

            $id = $request->id;
            $boss1_eva = $request->boss1_eva;
            $boss1_comment = $request->boss1_comment;
            $n = 1;
            foreach($id as $item) {
                $evaluation = Evaluation::find($item);
                $evaluation->boss1_eva = $boss1_eva[$n];
                $evaluation->boss1_comment = $boss1_comment[$n];
                $evaluation->save();
                $n++;
            }
        }elseif($class == 'boss2'){
            $user_evaluation = UserEvaluation::find($request->user_eva_id);
            $user_evaluation->progress = 7;
            $user_evaluation->save();

            $id = $request->id;
            $boss1_eva = $request->boss2_eva;
            $boss1_comment = $request->boss2_comment;
            $n = 1;
            foreach($id as $item) {
                $evaluation = Evaluation::find($item);
                $evaluation->boss2_eva = $boss1_eva[$n];
                $evaluation->boss2_comment = $boss1_comment[$n];
                $evaluation->save();
                $n++;
            }
            $collect_evaluations = $user_evaluation->evaluations;
            $datas = array();
            foreach($collect_evaluations as $collect_evaluation){
                $datas[] = $collect_evaluation->boss1_eva;
                $datas[] = $collect_evaluation->boss2_eva;
            }
            $result = array_sum($datas)/count($datas);
            $result_for_point = round($result,2);
            $user_evaluation->point = $result_for_point;

            $result_for_eva = round($result);
            if($result_for_eva == 5.0){
                $user_evaluation->evaluation = "SS";
            }elseif($result_for_eva == 4.0){
                $user_evaluation->evaluation = "S";
            }elseif($result_for_eva == 3.0){
                $user_evaluation->evaluation = "A";
            }elseif($result_for_eva == 2.0){
                $user_evaluation->evaluation = "B";
            }elseif($result_for_eva == 1.0){
                $user_evaluation->evaluation = "C";
            }
            $user_evaluation->save();

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

        $categories = CategoryYear::all();
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
        return view('boss.staff',[
            'user'=> $user,
            'columns'=> $columns,
            'image' => $user->image,
        ]);
    }
    public function show_for_admin(){
        $bosses = User::where('auth','boss1')
            ->orwhere('auth','boss2')
            ->get();
        $count = Category::all()->count();
//        $count = $category->id()->count;

        if($count >= 1)
        {
            $year = Category::orderBy('year')->first()->year;
            foreach($bosses as $boss){
                $columns[] = UserEvaluation::where('department',$boss->department)
                    ->where('year',$year)
                    ->get();
            }
        }else{
            $columns = null;
            $year = null;
        }

        $departments = Department::all();
        $categories = CategoryYear::all();
        $logs = Log::orderby('updated_at','desc')->get();

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

        if($bosses === !null){
            foreach($bosses as $boss){
                $columns[] = Evaluation::where('department',$boss->department)
                    ->where('year',$year)
                    ->get();
            }
        }else{
            $columns = null;
        }
        $categories = CategoryYear::all();
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


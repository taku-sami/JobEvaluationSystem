<?php


namespace App\Http\Controllers;

require_once __DIR__.'../../../../vendor/autoload.php';

use App\CategoryYear;
use Google_Service_Sheets_ClearValuesRequest;
use Illuminate\Http\Request;
use App\UserEvaluation;
use App\Category;
use Dotenv\Dotenv;
use phpDocumentor\Reflection\Location;

class GoogleSpreadSheetController extends Controller
{
    public function before_access(){
        $sheets = \App\GoogleSheet::instance();
        $sheet_id = '1_SaJKhxvzp2P9YHr1qtgt4V-zCc-73wvYFoDDyMYpsc';
        $sheets->spreadsheets_values->clear()(
            $sheet_id,
            'シート1!A2:I100'
        );
    }
    public function export(){
        $sheets = \App\GoogleSheet::instance();
        $sheet_id = '1_SaJKhxvzp2P9YHr1qtgt4V-zCc-73wvYFoDDyMYpsc';
        $range = 'シート1!A2:I100';
        $requestBody = new Google_Service_Sheets_ClearValuesRequest();

        $sheets->spreadsheets_values->clear($sheet_id, $range, $requestBody);

        $evaluations = UserEvaluation::all();
        foreach ($evaluations as $evaluation){
            $eva_id = $evaluation->id;
            $year = $evaluation->year;
            $user_id = $evaluation->user_id;
            $user_name = $evaluation->user_name;
            $dep = $evaluation->department;
            $eva = $evaluation->evaluation;
            $point = $evaluation->point;
            $c_date = $evaluation->created_at->format('Y年m月d日 H時i分s秒');
            $u_date = $evaluation->updated_at->format('Y年m月d日 H時i分s秒');

            $items = [
                $eva_id,
                $year,
                $user_id,
                $user_name,
                $dep,
                $eva,
                $point,
                $c_date,
                $u_date,
            ];

            $values = new \Google_Service_Sheets_ValueRange();
            $values->setValues([
                'values' => $items
            ]);
            $params = ['valueInputOption' => 'USER_ENTERED'];
            $sheets->spreadsheets_values->append(
                $sheet_id,
                'A1',
                $values,
                $params
            );
        }
        return redirect("https://docs.google.com/spreadsheets/d/1_SaJKhxvzp2P9YHr1qtgt4V-zCc-73wvYFoDDyMYpsc/edit?usp=sharing");
    }

    public function register_category(){
        $data = "https://spreadsheets.google.com/feeds/list/1ktufoM-jq8RK-vMfZPXwNey9ZpQhWSBWwQYsm_bIEB0/od6/public/values?alt=json";
        $json = file_get_contents($data);
        $json_decode = json_decode($json);

        if (empty($json_decode->feed->entry)){
            $error = "１つ以上の考課を入力してください。";
            return back()->with('error',$error);
        }else{
            $categories = $json_decode->feed->entry;
            foreach ($categories as $category) {
                $years[] = $category->{'gsx$年'}->{'$t'};
            }
        }

        $get_categoryyears =  CategoryYear::all();
        $categoryyears = array();

        foreach ($get_categoryyears as $get_categoryyear){
            $categoryyears[] = $get_categoryyear->year;
        }
        $count_years = count(array_unique($years));
        $dif = array_diff(array_unique($years),$categoryyears);
        $count_dif = count($dif);

        if($count_years =! $count_dif){
            $error = "既に登録している考課年度と重複しています。";
            return back()->with('error',$error);
        }

        foreach (array_unique($years) as $year){
            $categoryyear =  new CategoryYear;
            $categoryyear->year = $year;
            $categoryyear->save();
        }

        foreach ($categories as $category) {
            $add_category = new Category;
            $add_category->year = $category->{'gsx$年'}->{'$t'};
            $add_category->category = $category->{'gsx$考課名'}->{'$t'};
            $add_category->standard = $category->{'gsx$考課基準'}->{'$t'};
            $add_category->save();
        }

        $sheets = \App\GoogleSheet::instance();
        $sheet_id = '1ktufoM-jq8RK-vMfZPXwNey9ZpQhWSBWwQYsm_bIEB0';
        $range = 'シート1!A2:C100';
        $requestBody = new Google_Service_Sheets_ClearValuesRequest();

        $sheets->spreadsheets_values->clear($sheet_id, $range, $requestBody);

        return redirect('/categories');
    }

    public function show_sheets(){
        return redirect("https://docs.google.com/spreadsheets/d/1ktufoM-jq8RK-vMfZPXwNey9ZpQhWSBWwQYsm_bIEB0/edit?usp=sharing");
    }
}


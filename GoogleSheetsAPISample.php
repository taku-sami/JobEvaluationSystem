<?php

require_once __DIR__.'/vendor/autoload.php';

use App\UserEvaluation;
use Dotenv\Dotenv;

/**
 * Class GoogleSheetsAPISample
 */
class GoogleSheetsAPISample {

    /**
     * @var Google_Service_Sheets
     */
    protected $service;

    /**
     * @var array|false|string
     */
    protected $spreadsheetId;

    /**
     * GoogleSheetsAPISample constructor.
     */
    public function __construct()
    {
        $dotenv = Dotenv::create(__dir__);
        $dotenv->load();
        $credentialsPath = getenv('SERVICE_KEY_JSON');
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . dirname(__FILE__) . '/' . $credentialsPath);

        $this->spreadsheetId = getenv('SPREADSHEET_ID');

        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->addScope(Google_Service_Sheets::SPREADSHEETS);
        $client->setApplicationName('test');

        $this->service = new Google_Service_Sheets($client);
    }

    /**
     * @param string $date
     * @param string $name
     * @param string $comment
     */
    public function append(string $num, string $year, string $emp_num,string $emp_name,string $dep,string $eva,string $point,string $data1,string $data2)
    {
        $value = new Google_Service_Sheets_ValueRange();
        $value->setValues([ 'values' => [ $num, $year, $emp_num, $emp_name, $dep,$eva, $point, $data1, $data2 ] ]);
        $response = $this->service->spreadsheets_values->append($this->spreadsheetId, 'シート1!A1', $value, [ 'valueInputOption' => 'USER_ENTERED' ] );

        var_dump($response);
    }
}

$sample = new GoogleSheetsAPISample;

$evaluations = UserEvaluation::all();
dd($evaluations);
//foreach($evaluations as $evaluation)
//{
//    $num = $evaluation->id;
//    $year = $evaluation->year;
//    $emp_num = $evaluation->user_id;
//    $emp_name = $evaluation->user_name;
//    $dep = $evaluation->department;
//    $eva = $evaluation->evaluation;
//    $point = $evaluation->point;
//    $data1 = $evaluation->created_at;
//    $data2 = $evaluation->updated_at;
//    $sample->append($num, $year, $emp_num, $emp_name, $dep, $eva, $point, $data1, $data2);
//
//}


//$num = '1';
//$year = '2019';
//$emp_num = '1';
//$emp_name = '原拓弥';
//$dep = '開発部';
//$eva = 'SS';
//$point = '40';
//$data1 = date('Y/m/d');
//$data2 = date('Y/m/d');
//
//$sample->append($num, $year, $emp_num, $emp_name, $dep, $eva, $point, $data1, $data2);

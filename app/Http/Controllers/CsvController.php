<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\EvaluationsExport;
use App\Imports\CategoriesImport;
use Maatwebsite\Excel\Facades\Excel;

class CsvController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExportView()
    {
        return view('admin/csv/import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
//        return Excel::download(dd(new EvaluationsExport));
        return Excel::download(new EvaluationsExport, '考課一覧.csv');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        Excel::import(new CategoriesImport,request()->file('file'));

        return back();
    }
}

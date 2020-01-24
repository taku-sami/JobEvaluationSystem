<?php

namespace App\Http\Controllers;

use App\Exports\TemplateExport;
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
        return Excel::download(new EvaluationsExport, '考課一覧.csv');
    }
    public function template_export()
    {
        return Excel::download(new TemplateExport(), '考課登録テンプレート.csv');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        $validatedData = request()->validate([
            'file' => 'required|max:1000|mimes:csv',
        ]);
        Excel::import(new CategoriesImport,request()->file('file'));

        return back();
    }
}

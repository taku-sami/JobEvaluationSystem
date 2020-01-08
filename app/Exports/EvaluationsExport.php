<?php

namespace App\Exports;

use App\Evaluation;
use Maatwebsite\Excel\Concerns\FromCollection;

class EvaluationsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Evaluation::all();
    }
}

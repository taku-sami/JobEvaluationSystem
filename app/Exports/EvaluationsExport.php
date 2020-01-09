<?php

namespace App\Exports;

use App\Evaluation;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EvaluationsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return (Evaluation::all());
    }

    public function headings(): array
    {
        return [
            '評価番号',
            '年',
            '社員番号',
            '社員名',
            '部署',
            '評価',
            '評価ポイント',
            '作成日',
            '更新日',
        ];
        // TODO: Implement headings() method.
    }
}

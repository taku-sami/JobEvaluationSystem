<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\CsvTemplate;

class TemplateExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return (CsvTemplate::all());
    }

    public function headings(): array
    {
        return [
            '考課年度',
            '考課名',
            '考課基準',
        ];
        // TODO: Implement headings() method.
    }
}

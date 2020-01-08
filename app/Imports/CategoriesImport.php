<?php

namespace App\Imports;

use App\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoriesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Category([
            'category1'     => $row['category1'],
            'standard1'    => $row['standard1'],
            'category2'    => $row['category2'],
            'standard2'    => $row['standard2'],
            'category3'    => $row['category3'],
            'standard3'    => $row['standard3'],
            'year'    => $row['year'],
        ]);
    }
}

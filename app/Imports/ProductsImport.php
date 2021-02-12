<?php

namespace App\Imports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
HeadingRowFormatter::default('none');

class ProductsImport implements ToModel, WithHeadingRow
{

    use Importable;
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Producto([
            'CATEGORY' => $row['CATEGORY'],
            'PRODUCT_ID' => $row['PRODUCT_ID'],
            'PRODUCT_ORDER' => $row['PRODUCT_ORDER'],
            'COST' => $row['COST']
        ]);
    }

}

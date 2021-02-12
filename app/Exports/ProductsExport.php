<?php

namespace App\Exports;

use App\Models\Producto;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'CATEGORY',
            'PRODUCT_ID',
            'PRODUCT_ORDER',
            'COST'
        ];
    }
    public function collection()
    {
         $productos = Producto::select('CATEGORY', 'PRODUCT_ID', 'PRODUCT_ORDER', 'COST')
         ->where('CATEGORY', '!=', null)
         ->orderBy('PRODUCT_ORDER')
         ->get();
         return $productos;

    }
}

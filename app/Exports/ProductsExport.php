<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('name','cat_id','sup_id','code','store_room','store_route','image','buy_date','expire_date','buying_price','selling_price')->get();
    }
}

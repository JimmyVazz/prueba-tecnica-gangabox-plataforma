<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $fillable = [
        'CATEGORY',
        'PRODUCT_ID',
        'PRODUCT_ORDER',
        'COST'     
    ];
}

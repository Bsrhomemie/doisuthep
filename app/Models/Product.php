<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product_table';
    protected $fillable = [
        'name_th',
        'name_en',
        'price',
        'status',
        'picture',
    ];

}

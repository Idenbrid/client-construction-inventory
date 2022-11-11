<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'manufacturer',
        'product_name',
        'model_number',
        'unit',
        'created_by',
        'updated_by',
    ];

}

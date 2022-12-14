<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category',
        'manufacturer',
        'item_name',
        'item_number',
        'unit',
        'created_by',
        'updated_by',
    ];
    protected $dates = ['deleted_at'];

}

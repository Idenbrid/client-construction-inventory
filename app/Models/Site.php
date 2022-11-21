<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'site_name',
        'job_number',
        'created_by',
        'updated_by',
    ];
    
    protected $dates = ['deleted_at'];
}

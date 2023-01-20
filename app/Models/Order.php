<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'job_id',
        'job_no',
        'client_id',
        'item_id',
        'stocker_id',
        'site_name',
        'order_date',
        'amount',
        'created_by',
        'updated_by',
        'deleted_at',
    ];
    protected $dates = ['deleted_at'];
    Public function Job()
    {
        return $this->belongsTo(Site::class)->withDefault();
    }
    Public function Orderer()
    {
        return $this->belongsTo(User::class, 'client_id')->withDefault();
    }
    Public function Item()
    {
        return $this->belongsTo(Item::class)->withDefault();
    }
    Public function Stocker()
    {
        return $this->belongsTo(Warehouse::class, 'stocker_id')->withDefault();
    }
}

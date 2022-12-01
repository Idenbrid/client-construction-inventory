<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReserveOrder extends Model
{
    use HasFactory;
    Public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    Public function Job()
    {
        return $this->belongsTo(Site::class,);
    }
    Public function Orderer()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
    Public function Item()
    {
        return $this->belongsTo(Item::class,);
    }
    Public function Stocker()
    {
        return $this->belongsTo(Warehouse::class, 'stocker_id');
    }
}

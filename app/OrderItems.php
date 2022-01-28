<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderItems extends Model
{
    protected   $table          = 'order_items';
    protected   $primaryKey     = 'id';
    public      $timestamps     = true;

    protected $fillable = [
        'order_id', 'item_id', 'quantity', 'shipping_date', 'delivery_date',
        'vendor_notes', 'buyer_notes', 'created_at', 'updated_at'
    ];
}

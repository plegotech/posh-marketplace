<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerWebsite extends Model
{
    protected   $table          = 'seller_website';
    protected   $primaryKey     = 'id';
    public      $timestamps     = true;

    protected $fillable = [
        'seller_id', 'tier', 'site_template', 'domain', 'domain_purchased', 'created_at', 'updated_at'
    ];
}

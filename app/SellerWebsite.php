<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerWebsite extends Model
{
    protected   $table          = 'seller_settings';
//    protected   $primaryKey     = 'id';
//    public      $timestamps     = true;
//
//    protected $fillable = [
//        'seller_id', 'tier', 'site_template', 'domain', 'domain_purchased', 'created_at', 'updated_at'
//    ];
      protected $fillable = [
            'seller_id',
            'site_template',
            'domain',
            'h_shop_name',
            'h_shop_address',
            'f_main_menu_title',
            'f_main_menu_links',
            'f_company_title',
            'f_company_links',
            'f_discover_title',
            'f_discover_links',
            'f_findus_title',
            'f_findus_links',
          'created_at',
          'updated_at'
        ];

}

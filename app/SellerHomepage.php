<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerHomepage extends Model {

    //
    protected $table = 'seller_homepage';
    protected $fillable = [
        'seller_id', 'images_cat', 'images_new', 'images_hot', 'images_home', 'images_elec', 'created_at', 'updated_at'
    ];


}

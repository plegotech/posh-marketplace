<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    //
    protected $table = 'product_categories';
    protected $fillable = [
        'title', 'status', 'parent_category_id', 'seller_id', 'created_at', 'updated_at'
    ];
    public function children() {
        return $this->hasMany(Category::class, 'parent_category_id');
    }

}

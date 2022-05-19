<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    //
    protected $table = 'product_categories';
    protected $fillable = [
        'title', 'img', 'status', 'parent_category_id', 'seller_id', 'created_at', 'updated_at'
    ];
    public function children() {
        return $this->hasMany(Category::class, 'parent_category_id');
    }
    public function active_children() {
        return $this->children()->where('status','=', 1);
    }
    public function parent() {
        return $this->hasOne(Category::class, 'id', 'parent_category_id');
    }

}

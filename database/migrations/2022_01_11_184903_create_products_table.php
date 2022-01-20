<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('images')->nullable();
            $table->string('sku')->unique()->nullable();
            $table->string('description')->nullable();
            $table->enum('status', ['active', 'archived', 'deleted'])->default('active');
            $table->integer('vendor_id');
            $table->string('parent_category')->nullable();
            $table->string('sub_category')->nullable();
            $table->float('net_price');
            $table->float('sale_price')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

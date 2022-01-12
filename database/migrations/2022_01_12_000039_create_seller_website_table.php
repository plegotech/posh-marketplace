<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerWebsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_website', function (Blueprint $table) {
            $table->id();
            $table->enum('tier', ['tier_free', 'tier_two', 'tier_three'])->default('tier_free');
            $table->string('primary_category');
            $table->string('sub_categories')->nullable();
            $table->string('site_template')->nullable();
            $table->string('domain')->nullable();
            $table->string('domain_purchased')->nullable();
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
        Schema::dropIfExists('seller_website');
    }
}

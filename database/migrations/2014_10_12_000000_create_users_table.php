<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->string('u_address')->nullable();
            $table->string('u_zip')->nullable();
            $table->string('u_city')->nullable();
            $table->string('u_state')->nullable();
            $table->string('phone')->nullable();
            $table->enum('user_type', ['user', 'seller', 'vendor', 'admin'])->default('user');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamp('last_login')->useCurrent();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

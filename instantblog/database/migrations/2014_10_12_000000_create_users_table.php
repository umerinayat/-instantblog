<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('social_id', 191)->nullable();
            $table->boolean('is_admin')->default(0);
            $table->string('username', 32)->unique();
            $table->string('name', 191)->nullable();
            $table->string('email', 191)->unique();
            $table->string('avatar')->default('defaultuser.png');
            $table->string('password', 191);
            $table->string('website', 191)->nullable();
            $table->string('facebook', 191)->nullable();
            $table->string('twitter', 191)->nullable();
            $table->string('instagram', 191)->nullable();
            $table->string('linkedin', 191)->nullable();
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

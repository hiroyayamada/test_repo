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
            $table->increments('id');
            $table->string('username',20)->unique();    //名前
            $table->string('password',255);    //パスワード
            $table->integer('auth')->unsigned();     //権限

            $table->rememberToken();
            $table->timestamps();
            
            $table->softDeletes();
            
            $table->foreign('auth')->references('id')->on('auths')->onDelete('cascade');
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

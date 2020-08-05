<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyCorpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_corps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login_id',20)->unique();    //ログインID
            $table->string('password',255);
            $table->string('corp_name');
            $table->integer('registered_user')->unsigned(); 

            $table->rememberToken();
            $table->timestamps();
            
            $table->softDeletes();

            $table->foreign('registered_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_corps');
    }
}

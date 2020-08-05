<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('belongs');                              // 所属
            $table->string('pic')->nullable();                      // 担当者
            $table->string('hsa_pic')->nullable();                  // HSA担当
            $table->string('progress');                             // 進捗
            $table->string('contractor');                           // 契約者
            $table->string('contractor_kana');                      // 契約者フリガナ
            $table->boolean('another_name')->default("0");          // 別名義
            $table->string('contractor_contact')->nullable();       // 契約者連絡先
            $table->string('responder_contact')->nullable();        // 対応者連絡先
            $table->string('other_contact')->nullable();            // その他連絡先
            $table->string('email')->nullable();                    // メールアドレス
            $table->string('zipcode');                              // 郵便番号
            $table->string('prefectures');                          // 都道府県
            $table->string('city')->nullable();                     // 市区町村
            $table->string('town_area')->nullable();                // 町域
            $table->string('buildingname_roomnumber')->nullable();  // 建物名・部屋番号
            $table->string('responder')->nullable();                // 対応者
            $table->string('responder_kana')->nullable();           // 対応者フリガナ
            $table->text('note')->nullable();                       // 備考
            $table->integer('registered_user')->unsigned();                         // 登録ユーザー

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
        Schema::dropIfExists('clients');
    }
}

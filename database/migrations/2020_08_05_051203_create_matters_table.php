<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMattersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_search')->unsigned();    // 顧客検索
            $table->integer('status')->unsigned();    // ステータス
            $table->string('application_status')->nullable();    // 申請状況
            $table->string('belongs')->nullable();    // 所属
            $table->string('pic');    // 担当者
            $table->string('hsa_pic')->nullable();    // HSA担当者
            $table->string('contractor')->nullable();    // 契約者
            $table->string('responder')->nullable();    // 対応者
            $table->string('contractor_contact')->nullable();    // 契約者連絡先
            $table->string('responder_contact')->nullable();    // 対応者連絡先
            $table->string('other_contact')->nullable();    // その他連絡先
            $table->string('email')->nullable();    // メールアドレス
            $table->date('completion_date')->nullable();    // 受付完了日
            $table->date('contract_date')->nullable();    // 契約日
            $table->string('contract_item')->nullable();    // 契約項目
            $table->string('insurance_account_payable')->nullable();    // 保険金入金先
            $table->string('contract')->nullable();    // 契約書
            $table->string('work_reward')->nullable();    // 業務報酬
            $table->string('zipcode');     // 郵便番号
            $table->string('prefectures');    // 都道府県
            $table->string('city');    // 市区町村
            $table->string('town_area');    // 町域
            $table->string('buildingname_roomnumber')->nullable();    // 建物名・部屋番号
            $table->string('survey')->nullable();    // 調査担当
            $table->date('survey_date')->nullable();    // 調査日
            $table->string('weekday_survey')->nullable();    // 平日調査可否
            $table->string('judge')->nullable();    // 鑑定担当
            $table->date('judge_date')->nullable();    // 鑑定日
            $table->string('construction')->nullable();    // 工事
            $table->string('management')->nullable();    // 管理
            $table->text('note')->nullable();    // 備考
            $table->text('within_company_note')->nullable();    // 社内用備考
            $table->string('insurance_company')->nullable();    // 保険会社
            $table->integer('insurance_amount')->nullable();    // 保険金額
            $table->date('insurance_joindate')->nullable();    // 保険加入日
            $table->string('insurance_policynumber')->nullable();    // 保険証券番号
            $table->string('insurance_applicationdate')->nullable();    // 保険申請歴
            $table->date('application_date')->nullable();    // 申請日
            $table->string('application_content')->nullable();    // 申請内容
            $table->date('building_date')->nullable();    // 建築年月日
            $table->date('building_year')->nullable();    // 建築年数(CRM)
            $table->string('structure')->nullable();    // 構造
            $table->string('drawing')->nullable();    // 図面
            $table->string('drawing_share')->nullable();    // 図面共有
            $table->string('repair_history')->nullable();    // 修善歴
            $table->date('repair_date')->nullable();    // 修善日
            $table->string('repair_content')->nullable();    // 修善内容
            $table->string('accident')->nullable();    // 事故
            $table->date('accident_date')->nullable();    // 事故日
            $table->string('document_submit_to')->nullable();    // 資料提出先
            $table->date('submit_sending_date')->nullable();    // 提出発送日
            $table->date('copy_sending_date')->nullable();    // 控え発送日
            $table->string('judge_result')->nullable();    // 鑑定結果
            $table->integer('client_amount_received')->nullable();    // 顧客受領額
            $table->date('paymentdecision_notification_date')->nullable();    // 支払決定通知日
            $table->date('client_receipt_date')->nullable();    // 顧客受領日
            $table->integer('work_reward_calculatedamount')->nullable();    // 業務報酬計算額
            $table->integer('work_reward_amount')->nullable();    // 業務報酬額
            $table->integer('work_reward_amount_auto')->nullable();    // 業務報酬額（自動）
            $table->integer('work_reward_amount_received')->nullable();    // 業務報酬着金額
            $table->date('reward')->nullable();    // 報酬入金日
            $table->date('bill_issue_date')->nullable();    // 請求書発行日
            $table->string('crm_control_number')->nullable();    // CRM管理番号
            $table->string('control_number')->nullable();    // 管理番号
            $table->integer('calculation_coefficient')->nullable();    // 計算用係数
            $table->integer('P')->nullable();    // P
            $table->integer('registered_user')->unsigned();    // 登録ユーザー
            
            $table->timestamps(); 
            
            $table->softDeletes(); 

            $table->foreign('client_search')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('status')->references('id')->on('status')->onDelete('cascade');
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
        Schema::dropIfExists('matters');
    }
}

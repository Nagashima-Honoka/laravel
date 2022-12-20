<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) { // Schema::create（ テーブル名, クロージャでテーブルのフィールド設定 ）でテーブルの生成
            $table->increments('id'); // プライマリーキー
            $table->integer('person_id'); // 関連するpeopleテーブルのレコードを管理するID
            $table->string('title');
            $table->string('message');
            $table->timestamps(); // created_at, updated_atは自動生成
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}

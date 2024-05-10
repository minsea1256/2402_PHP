<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boards', function(Blueprint $table) {
            // foreign: 참조할 테이블 , references: 추가테이블 on: 테이블명
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boards', function(Blueprint $table) {
            // $table->dropForeign('boards_user_id_foreign') // ('boards_삭제할 테이블 명_foreign') 제약조건문 으로 삭제
            $table->dropForeign(['user_id']); // 컬럼명으로 삭제
        });
    }
};

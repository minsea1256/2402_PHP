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
        Schema::table('users', function(Blueprint $table){
            $table->char('gender', 1)->nullable()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    // 마이그레이션으로 관리하기 위해 테이블 삭제 처리는 넣어줘야 rollback 처리가 가능하다
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('gender');
        });
    }
};

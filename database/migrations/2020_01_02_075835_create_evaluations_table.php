<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('goal')->nullable();
            $table->string('self_eva')->default("未評価");
            $table->string('self_comment')->default("未評価");
            $table->string('boss1_eva')->default("未評価");
            $table->string('boss1_comment')->default("未評価");
            $table->string('boss2_eva')->default("未評価");
            $table->string('boss2_comment')->default("未評価");
            $table->integer('year');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('user_evaluation_id')->nullable();
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
        Schema::dropIfExists('evaluations');
    }
}

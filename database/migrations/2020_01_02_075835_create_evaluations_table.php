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
            $table->string('goal_1')->nullable();
            $table->string('goal_2')->nullable();
            $table->string('goal_3')->nullable();
            $table->string('self_eva1')->nullable();
            $table->string('self_eva2')->nullable();
            $table->string('self_eva3')->nullable();
            $table->string('boss1_eva1')->nullable();
            $table->string('boss1_eva2')->nullable();
            $table->string('boss1_eva3')->nullable();
            $table->string('boss2_eva1')->nullable();
            $table->string('boss2_eva2')->nullable();
            $table->string('boss2_eva3')->nullable();
            $table->integer('year');
            $table->integer('user_id');
            $table->string('user_name');
            $table->string('department');
            $table->integer('progress')->default(1);
            $table->integer('evaluation')->default('未評価');
            $table->integer('point')->default('未評価');


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

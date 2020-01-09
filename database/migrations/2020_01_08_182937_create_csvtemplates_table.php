<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsvtemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csvtemplates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category1');
            $table->string('standard1');
            $table->string('category2');
            $table->string('standard2');
            $table->string('category3');
            $table->string('standard3');
            $table->integer('year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('csvtemplates');
    }
}

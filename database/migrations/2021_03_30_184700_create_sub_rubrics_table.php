<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubRubricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_rubrics', function (Blueprint $table) {
			$table->integerIncrements('id');
			$table->unsignedInteger('rubric_id');
			$table->string('name')->unique();

			$table->foreign('rubric_id')
				->references('id')
				->on('rubrics')
				->onUpdate('cascade')
				->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_rubrics');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRubricHasSubRubricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubric_has_sub_rubrics', function (Blueprint $table) {
			$table->unsignedInteger('sub_rubric_id');
			$table->unsignedInteger('rubric_id');

			$table->foreign('sub_rubric_id')
				->references('id')
				->on('sub_rubrics')
				->onDelete('cascade');

			$table->foreign('rubric_id')
				->references('id')
				->on('rubrics')
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
        Schema::dropIfExists('rubric_has_sub_rubrics');
    }
}

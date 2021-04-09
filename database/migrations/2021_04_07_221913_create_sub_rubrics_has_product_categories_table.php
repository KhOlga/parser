<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubRubricsHasProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_rubrics_has_product_categories', function (Blueprint $table) {
			$table->unsignedInteger('sub_rubric_id');
			$table->unsignedInteger('product_category_id');

			$table->foreign('sub_rubric_id')
				->references('id')
				->on('sub_rubrics')
				->onDelete('cascade');

			$table->foreign('product_category_id')
				->references('id')
				->on('product_categories')
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
        Schema::dropIfExists('sub_rubrics_has_product_categories');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integerIncrements('id');
			$table->unsignedInteger('rubric_id');
			$table->unsignedInteger('sub_rubric_id');
			$table->unsignedInteger('product_category_id');
			$table->unsignedInteger('manufacturer_id');
			$table->string('name')->unique();
			$table->text('description');
			$table->string('model_code');
			$table->double('price');
			$table->boolean('available');
            $table->timestamps();

			$table->index(['rubric_id']);
			$table->index(['sub_rubric_id']);
			$table->index(['product_category_id']);
			$table->index(['manufacturer_id']);

			$table->foreign('rubric_id')
				->references('id')
				->on('rubrics')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->foreign('sub_rubric_id')
				->references('id')
				->on('sub_rubrics')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->foreign('product_category_id')
				->references('id')
				->on('product_categories')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->foreign('manufacturer_id')
				->references('id')
				->on('manufacturers')
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
        Schema::dropIfExists('products');
    }
}

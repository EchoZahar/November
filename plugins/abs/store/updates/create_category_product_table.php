<?php

namespace Abs\Score\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateCategoriesTable Migration
 */
class CreateCategoryProductTable extends Migration
{
    public function up()
    {
        Schema::create('abs_store_category_product', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->primary(['category_id', 'product_id']);
//            $table->foreign('category_id')->references('id')->on('abs_store_categories')
//                ->cascadeOnUpdate()->cascadeOnDelete();
//            $table->foreign('product_id')->references('id')->on('abs_store_products')
//                ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abs_score_category_product');
    }
}

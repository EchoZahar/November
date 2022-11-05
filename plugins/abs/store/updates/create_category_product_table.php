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
        });
    }

    public function down()
    {

        if (Schema::hasTable('abs_store_category_product')) {
//            Schema::table('abs_store_products', function (Blueprint $table) {
//                $table->dropPrimary('category_id');
//                $table->dropPrimary('product_id');
//                $table->dropIndex('product_id');
//            });
            Schema::drop('abs_store_category_product');
        }


    }
}

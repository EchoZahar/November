<?php namespace Abs\Store\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateProductsTable Migration
 */
class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('abs_store_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->boolean('is_published')->default(false);
            $table->float('default_price', 8, 2)->default(0.00);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abs_store_products');
    }
}

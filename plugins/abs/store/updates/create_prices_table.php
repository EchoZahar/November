<?php namespace Abs\Store\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreatePricesTable Migration
 */
class CreatePricesTable extends Migration
{
    public function up()
    {
        Schema::create('abs_store_prices', function (Blueprint $table) {
            $table->id();
            $table->float('price', 8, 2)->default(0.00);
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('currency_id')->unsigned();
            $table->timestamps();
//            $table->foreign('product_id')->references('product_id')->on('abs_store_products')
//                ->cascadeOnUpdate()->cascadeOnDelete();
//            $table->foreign('currency_id')->references('currency_id')->on('abs_store_currencies')
//                ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abs_store_prices');
    }
}

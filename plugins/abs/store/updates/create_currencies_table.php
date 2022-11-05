<?php namespace Abs\Store\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateCurrenciesTable Migration
 */
class CreateCurrenciesTable extends Migration
{
    public function up()
    {
        Schema::create('abs_store_currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('code', 4);
            $table->string('symbol', 50)->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abs_store_currencies');
    }
}

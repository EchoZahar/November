<?php namespace Abs\Store\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateCategoriesTable Migration
 */
class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('abs_store_categories', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_published')->default(false);
            $table->string('name', 150)->unique();
            $table->string('slug', 160)->unique();
            $table->text('description')->nullable();
            $table->integer('parent_id')->default(0)->nullable();
            $table->integer('nest_left')->default(0);
            $table->integer('nest_right')->default(0);
            $table->integer('nest_depth')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abs_store_categories');
    }
}

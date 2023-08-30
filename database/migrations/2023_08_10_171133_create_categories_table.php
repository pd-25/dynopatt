<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('catagory_slug', 250)->unique();
            $table->string('catagory_name', 250);
            $table->string('objective_f', 250);
            $table->string('objective_s', 250);
            $table->string('objective_t', 250);
            $table->string('objective_fo', 250);
            $table->boolean('category_type')->default(0);
            $table->text('overview');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

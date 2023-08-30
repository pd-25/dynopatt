<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
          
            $table->string('price');
            $table->boolean('status')->default(1);
            $table->string('enroll_url');
            $table->string('cover_image');
            $table->foreignId('category_id')->constrained('categories')->unsigned()->nullable();
            $table->text('overview');
            $table->string('objective_f', 250);
            $table->string('objective_s', 250);
            $table->string('objective_t', 250);
            $table->string('objective_fo', 250);
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
        Schema::dropIfExists('courses');
    }
}

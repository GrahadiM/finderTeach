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
            $table->bigInteger('teacher_id');
            $table->bigInteger('category_id');
            $table->string('day')->nullable();
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            $table->integer('price')->nullable();
            $table->string('status')->nullable(); // active, non_active, archive
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

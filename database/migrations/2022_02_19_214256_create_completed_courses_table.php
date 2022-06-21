<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletedCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment('student')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('complete')->default(0);
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
        Schema::dropIfExists('completed_courses');
    }
}

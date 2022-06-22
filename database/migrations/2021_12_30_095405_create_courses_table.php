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
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->comment('teacher_id');
            $table->foreignId('course_cat_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('skill_level',80);
            $table->string('language',80);
            $table->string('image',100);
            // $table->string('alt',100);
            $table->string('video_des',255)->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->comment('0=running,1=complete')->default(0);
            // $table->text('instructor')->nullable();
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

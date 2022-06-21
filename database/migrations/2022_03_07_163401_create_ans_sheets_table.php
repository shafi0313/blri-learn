<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnsSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ans_sheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment('user')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('course_id')->comment('teacher')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('mark')->default(0);
            $table->boolean('times')->default(0);
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
        Schema::dropIfExists('ans_sheets');
    }
}

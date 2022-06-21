<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('logo_header')->nullable();
            $table->string('navbar_header')->nullable();
            $table->string('sidebar')->nullable();
            $table->string('background')->nullable();
            $table->string('tbl',15)->nullable();
            $table->string('tbl_bg',15)->nullable();
            $table->string('tbl_text',15)->nullable();
            $table->string('submit_btn',15)->nullable();
            $table->string('create_btn',15)->nullable();
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
        Schema::dropIfExists('layouts');
    }
}

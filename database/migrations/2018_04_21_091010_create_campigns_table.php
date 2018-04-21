<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campigns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('template_id')->unsigned();
            $table->string('name')->nullable();
            $table->text('post_title')->nullable();
            $table->text('image_title')->nullable();
            $table->text('image_description')->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            // $table->timestamps();

            $table->foreign('template_id')->references('id')->on('templates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campigns');
    }
}

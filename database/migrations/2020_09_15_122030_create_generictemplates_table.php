<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenerictemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generictemplates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('templateid')->unsigned();
            $table->foreign('templateid')->references('id')->on('templates');
            $table->text('title');
            $table->text('subtitle');
            $table->text('image_url');
            $table->text('default_url');
            $table->bigInteger('createdby')->unsigned();
            $table->foreign('createdby')->references('id')->on('users');
            $table->bigInteger('updatedby')->unsigned();
            $table->foreign('updatedby')->references('id')->on('users');
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
        Schema::dropIfExists('generictemplates');
    }
}

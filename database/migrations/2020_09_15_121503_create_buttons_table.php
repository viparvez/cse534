<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateButtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buttons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type',['postback','web_url'])->default('postback');
            $table->text('title');
            $table->text('resource');
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
        Schema::dropIfExists('buttons');
    }
}

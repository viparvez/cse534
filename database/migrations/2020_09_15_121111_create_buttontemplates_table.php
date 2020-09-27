<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateButtontemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buttontemplates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('templateid')->unsigned();
            $table->foreign('templateid')->references('id')->on('templates');
            $table->text('message')->nullable();
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
        Schema::dropIfExists('buttontemplates');
    }
}

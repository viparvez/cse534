<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodetypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodetypes', function (Blueprint $table) {
            $table->bigIncrements('nodetypeid');
            $table->String('nodetype',28);
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
        Schema::dropIfExists('nodetypes');
    }
}

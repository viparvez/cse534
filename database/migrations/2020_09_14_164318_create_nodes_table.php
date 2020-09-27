<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->bigIncrements('nodeid');
            $table->String('nodename',64);
            $table->bigInteger('nodetypeid')->unsigned();
            $table->foreign('nodetypeid')->references('nodetypeid')->on('nodetypes');
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
        Schema::dropIfExists('nodes');
    }
}

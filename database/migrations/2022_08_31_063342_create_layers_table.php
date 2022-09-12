<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title',50);
            $table->string('type',60);
            $table->integer('width')->unsigned();
            $table->integer('height')->unsigned();
            $table->integer('position_x');
            $table->integer('position_y');
            $table->integer('position_z');
            $table->integer('layer_index')->unsigned();
            $table->string('default',60);
            $table->string('metas',60);
            $table->timestamps();
        });
//        layesrs
//post_id,
//title imageHolder_01
//,type,
//width,
//height,
//position_(x,y,z)
////,compsiti/on,
////composition_index,
//layer_index,
//defulat,
//metas,
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layers');
    }
};

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
        Schema::create('user_project_layers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_project_id')->references('id')->on('user_project')->onDelete('cascade');
            $table->foreignId('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->string('type',30);
            $table->string('property',30);
            $table->string('value',150);
            $table->string('composition',90);
            $table->string('layer',80);
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
        Schema::dropIfExists('user_project_layers');
    }
};

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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('slug',30);
            $table->string('title',30);
            $table->string('except',30);//توضیحات کوتاه
            $table->text('content');
            $table->string('thumbnail',50);// for image
//            $table->string('preview',30);
            $table->string('aep',30);
            $table->string('script',30);
//            $table->string('sound',30);
//            $table->string('duration',30);
            $table->string('project_token',30);
            $table->string('project_model',30);
//            $table->string('frame_rate',30);
            $table->string('project_direction',30);
//            $table->string('slide_mode',30);
//            $table->string('price_type',30);
//            $table->string('transition',30);
//            $table->string('background',30);
            $table->boolean('parent',30);
            $table->string('post_type',30);
            $table->boolean('status');
            $table->dateTime('published_at');
            $table->dateTime('deleted_at');
            $table->timestamps();
            $table->json('renders',180)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};

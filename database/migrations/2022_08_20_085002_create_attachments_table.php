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
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('relation_type',20);//project or options
            $table->bigInteger('relation_id')->unsigned();
            $table->string('title',30);//37213671263.jpg or 45454545.json
            $table->text('description');
            $table->string('poster');
            $table->string('mime',12);// image/jpg
            $table->string('type',20);//image application
            $table->string('extension',8);
            $table->integer('size')->unsigned();
            $table->integer('duration');//for music values are 0 or duration music
            $table->string('path',100);//path file upload/352532513.jpg
            $table->boolean('parent');// for images small and big if small image is 1 else 0
            $table->enum('in',array('public','beforePublic','ftp'));// public or beforePublic or ftp
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('attachments');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
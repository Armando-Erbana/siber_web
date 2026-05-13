<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('category', 50);          
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt');                 
            $table->text('content')->nullable();      
            $table->datetime('published_at');
            $table->string('image')->nullable();      
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
};
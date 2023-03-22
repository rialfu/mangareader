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
        Schema::create('manga_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manga_chapter_id');
            $table->smallInteger('page');
            $table->timestamps();
            $table->foreign('manga_chapter_id')->references('id')->on('manga_chapters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manga_images');
    }
};

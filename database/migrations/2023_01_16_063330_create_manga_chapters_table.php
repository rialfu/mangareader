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
        Schema::create('manga_chapters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manga_id');
            $table->boolean('show', false);
            $table->enum('lang', ['id','en']);
            $table->timestamps();
            $table->foreign('manga_id')->references('id')->on('mangas');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manga_chapters');
    }
};

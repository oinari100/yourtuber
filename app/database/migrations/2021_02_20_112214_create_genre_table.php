<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre', function (Blueprint $table) {
            $table->string('url', 200);
            $table->string('adult', 1);
            $table->string('cool', 1);
            $table->string('crazy', 1);
            $table->string('cute', 1);
            $table->string('everyday', 1);
            $table->string('love', 1);
            $table->string('mysterious', 1);
            $table->string('scared', 1);
            $table->string('study', 1);
            $table->string('surprise', 1);
            $table->string('unwind', 1);
            $table->string('youth', 1);
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
        Schema::dropIfExists('genre');
    }
}

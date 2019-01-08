<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClergyParishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clergy_parish', function (Blueprint $table) {
            $table->unsignedInteger('parish_id');
            $table->unsignedInteger('clergy_id');
            $table->timestamps();

            $table->foreign('parish_id')->references('id')->on('parishes')->onDelete('cascade');
            $table->foreign('clergy_id')->references('id')->on('clergies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parish_priest');
    }
}

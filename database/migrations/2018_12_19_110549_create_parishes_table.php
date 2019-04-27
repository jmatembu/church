<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->unsignedInteger('diocese_id')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->jsonb('settings')->nullable();
            $table->timestamps();

            $table->foreign('diocese_id')->references('id')->on('dioceses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('parishes');
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

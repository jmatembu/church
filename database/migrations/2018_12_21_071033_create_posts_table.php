<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->string('meta_description')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('author_id')->nullable();
            $table->unsignedInteger('postable_id');
            $table->string('postable_type');
            $table->timestamp('start_publishing_at')->useCurrent();
            $table->timestamp('stop_publishing_at')->nullable();
            $table->boolean('featured')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
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
        Schema::dropIfExists('posts');
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

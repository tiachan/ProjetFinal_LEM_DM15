<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_post', function (Blueprint $table) {
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedInteger('post_id')->nullable();
            $table->foreign('post_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //      Schema::table('posts', function (Blueprint $table) {
        //             $table->dropForeign('category_post_category_id_foreign');
        //             $table->dropColumn('category_id');
        //             $table->dropForeign('category_post_post_id_foreign');
        //             $table->dropColumn('post_id');   
        // });
                        Schema::dropIfExists('category_post');

    }
}
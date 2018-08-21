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
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->enum('post_types', ['formation', 'stage', 'indéfini']);
            $table->string('title', 100);
            $table->string('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->decimal('price', 7, 2);
            $table->smallInteger('nb_max');
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

         Schema::table('posts', function (Blueprint $table) {
                    $table->dropForeign('posts_category_id_foreign');
                    $table->dropColumn('category_id');

        });    
     }
}

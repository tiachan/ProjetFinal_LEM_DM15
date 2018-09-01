<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id')->nullable();
            $table->foreign('post_id')->references('id')->on('posts');
            $table->string('link', 100);
            $table->string('title', 100)->nullable();
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

        //  Schema::table('posts', function (Blueprint $table) {
        //             //$table->dropForeign('pictures_post_id_foreign');
        //             //$table->dropColumn('post_id');

        // });  
        Schema::dropIfExists('pictures');  
     }
}
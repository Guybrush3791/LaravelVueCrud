<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('post_tag', function(Blueprint $table) {

        $table->foreign('post_id', 'post')
                  ->references('id')
                  ->on('posts')
                  ->onDelete('cascade');
        $table->foreign('tag_id', 'tag')
                  ->references('id')
                  ->on('tags')
                  ->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('post_tag', function(Blueprint $table) {

        $table->dropForeign('post');
        $table->dropForeign('tag');        
      });
    }
}

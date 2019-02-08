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
			
			$table->integer('category_id')->nullable();
			$table->foreign('category_id')
				   ->references('id')
				   ->on('categories')
				   ->onUpdate('cascade')
				   ->onDelete('cascade'); //Отношения внешнего ключа для каскадного del, upd
			
			$table->string('slug')->nullable();
			$table->string('name', 80)->nullable();
			$table->text('description');
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
        Schema::dropIfExists('posts');
    }
}

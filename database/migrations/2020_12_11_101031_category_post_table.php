<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoryPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_id')->unsigned()->index();
            $table->bigInteger('category_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')
            ->onUpdate('restrict')->onDelete('restrict');

            $table->foreign('post_id')->references('id')->on('posts')
            ->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

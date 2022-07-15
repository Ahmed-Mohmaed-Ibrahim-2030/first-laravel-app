<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('book_rates');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::create('book_rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');


            $table->foreign('user_id')->references('id')->on('users') ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('book_id');


            $table->foreign('book_id')->references('id')->on('books') ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->tinyInteger('rate');
            $table->text('comment');
            $table->unique(['user_id','book_id'],'book_rates_unique_user_book');
            $table->timestamps();
        });
    }
};

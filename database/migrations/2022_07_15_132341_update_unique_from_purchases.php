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
        Schema::table('purchases', function (Blueprint $table) {
            //
            $table->dropUnique('purchases_book_id_foreign');
            $table->unique(['user_id','book_id'],'purchases_unique_user_book');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchases', function (Blueprint $table) {
            //
            $table->unique('book_id','purchases_book_id_foreign');
            $table->dropUnique('purchases_unique_user_book');
        });
    }
};

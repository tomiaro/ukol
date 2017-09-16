<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name"); 
            $table->string("detail"); 
            $table->date("fromD")->nullable(); 
            $table->date("tD")->nullable(); 
            $table->integer("user_id"); 


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books;');
    }
}

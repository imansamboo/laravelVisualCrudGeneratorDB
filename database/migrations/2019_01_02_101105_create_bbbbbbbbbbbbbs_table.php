<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBbbbbbbbbbbbbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bbbbbbbbbbbbbs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->enum('name', ["fsffsfs","vdbdbdA","dvdvd"]);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bbbbbbbbbbbbbs');
    }
}

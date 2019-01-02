<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDavaidbababisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('davaidbababis', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->enum('name', ["dsds","1212"]);
            $table->string('ccc');
            $table->string('dddd');
            $table->string('eeee');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('davaidbababis');
    }
}

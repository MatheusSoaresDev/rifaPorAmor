<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RifaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rifa', function (Blueprint $table){
           $table->string('id')->primary();
           $table->string('nome');
           $table->date('dataFechamento');
           $table->integer('limiteParticipantes');
           $table->string('premio');
           $table->text('objetivo');
           $table->boolean("status")->default(true);
           $table->string('user_id');
           $table->float('valor');
           $table->timestamps();

           $table->foreign('user_id')
               ->references('id')
               ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rifa');
    }
}

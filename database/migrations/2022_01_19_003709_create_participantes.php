<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participante', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nome');
            $table->string('email');
            $table->string('contato');
            $table->string('numeroEscolhido');
            $table->boolean('vencedor')->default(false);
            $table->string('id_rifa');
            $table->timestamps();

            $table->foreign('id_rifa')
                ->references('id')
                ->on('rifa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participante');
    }
}

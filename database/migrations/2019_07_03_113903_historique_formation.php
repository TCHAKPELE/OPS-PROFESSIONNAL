<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HistoriqueFormation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HistoriqueFormation', function (Blueprint $table) {

        $table->integer('id_users');
             $table->foreign('id_users')->references('id')->on('users');
             $table->integer('id_formation');
            $table->foreign('id_formation')->references('id_formation')->on('Formations');
             $table->integer('score_théorique');
              $table->integer('score_pratique');
               $table->integer('resultat_test');
            $table->boolean('Exam');
            $table->timestamp('created_at')->nullable();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('HistoriqueFormation');
    }
}

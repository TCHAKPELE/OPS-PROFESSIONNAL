<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HistoriqueSelection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('HistoriqueSelections', function (Blueprint $table) {

         $table->integer('id');
             $table->foreign('id')->references('id')->on('users');
             $table->integer('num_offre');
            $table->foreign('num_offre')->references('num_offre')->on('appel_d_offre');
              $table->integer('num_zone');
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
        Schema::dropIfExists('HistoriqueSelections');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AttributionZone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('attribution_zones', function (Blueprint $table) {

         $table->bigIncrements('num_zone');
             $table->string('nom_zone');
             $table->integer('nbr_ops');
               $table->integer('num_offre');
            $table->foreign('num_offre')->references('id')->on('appel_d_offre');
            $table->integer('renumeration');
            
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
        //
    }
}

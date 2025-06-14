<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('tension_arterielle')->nullable(); // ex: "125/80"
            $table->integer('frequence_cardiaque')->nullable(); // ex: 72 bpm
            $table->float('glycemie')->nullable(); // ex: 1.0 g/L
            $table->float('imc')->nullable(); // ex: 22.3
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['tension_arterielle', 'frequence_cardiaque', 'glycemie', 'imc']);
        });
    }


    /**
     * Reverse the migrations.
     */
    
};

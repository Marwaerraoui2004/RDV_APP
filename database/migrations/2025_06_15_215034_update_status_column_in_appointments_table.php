<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateStatusColumnInAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement("ALTER TABLE appointments MODIFY COLUMN status ENUM('en attente', 'accepté', 'refusé') DEFAULT 'en attente'");
        
        // Optionnel: Mettre à jour les valeurs existantes
        DB::table('appointments')
            ->where('status', 'confirmé')
            ->update(['status' => 'accepté']);
            
        DB::table('appointments')
            ->where('status', 'annulé')
            ->update(['status' => 'refusé']);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::statement("ALTER TABLE appointments MODIFY COLUMN status ENUM('en attente', 'confirmé', 'annulé') DEFAULT 'en attente'");
        
        // Optionnel: Rétablir les anciennes valeurs
        DB::table('appointments')
            ->where('status', 'accepté')
            ->update(['status' => 'confirmé']);
            
        DB::table('appointments')
            ->where('status', 'refusé')
            ->update(['status' => 'annulé']);
    }
}
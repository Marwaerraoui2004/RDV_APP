<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDoctorIdToDocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            // Vérifie si la colonne n'existe pas déjà
            if (!Schema::hasColumn('documents', 'doctor_id')) {
                $table->foreignId('doctor_id')
                      ->constrained('users') // référence la table users
                      ->onDelete('cascade'); // supprime les documents si le médecin est supprimé
            }
        });
    }

    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            // Supprime la contrainte de clé étrangère d'abord
            $table->dropForeign(['doctor_id']);
            // Puis supprime la colonne
            $table->dropColumn('doctor_id');
        });
    }
}
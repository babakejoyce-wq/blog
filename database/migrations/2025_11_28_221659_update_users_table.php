<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //supprimer la colonne name
            $table->dropColumn('name');
            //Ajouter les nouvelles colonnes
            $table->string('nom')->nullable();
            $table->string("prenom")->nullable();
            $table->string('telephone')->nullable();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //Restaurer name
            $table->string('name')->nullale();
            //Supprimer les colonnes ajoutées
            $table->dropColumn(['nom','prenom','telephone']);
        });
    }
};

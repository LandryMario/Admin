<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
           
$table->id();
$table->string('immatriculation');
$table->string('nom');
$table->string('prenom');
$table->string('email');
$table->string('appel');
$table->string('tribunal');
$table->string('password');
$table->boolean('status')->default(1);// 1 pour actif et 0 pour inactif
$table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Utilisateurs', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    
    }
};

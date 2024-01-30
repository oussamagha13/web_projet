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
        Schema::create('commandeliv', function (Blueprint $table) {
            $table->id();
            $table->integer('id_commande');
            $table->integer('id_livreur');
            $table->integer('id_art');
            $table->string('adress_art');
            $table->string('adress_client');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandeliv');
    }
};

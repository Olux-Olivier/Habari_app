<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->dateTime('date_debut');
            $table->dateTime('date_fin')->nullable();
            $table->string('lieu');
            $table->string('image')->nullable(); // Bannière de l'événement
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('evenements');
    }
};

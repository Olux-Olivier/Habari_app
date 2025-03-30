<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('predications', function (Blueprint $table) {
            $table->id();
            $table->text('predicateur');
            $table->string('titre');
            $table->text('description');
            $table->enum('categorie', ['enseignement', 'exhortation', 'témoignage']);
            $table->text('versets')->nullable(); // Champ pour les versets bibliques
            $table->string('photo')->nullable(); // Champ pour l'image
            $table->timestamp('date_publication')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('predications');
    }
};


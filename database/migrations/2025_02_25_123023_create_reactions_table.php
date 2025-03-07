<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('predication_id')->constrained()->onDelete('cascade');
            $table->enum('type_reaction', ['like', 'amen', 'gloire_a_dieu']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('reactions');
    }
};

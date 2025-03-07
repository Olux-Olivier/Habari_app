<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('predication_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('commentaires');
    }
};

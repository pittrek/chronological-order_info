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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('year')->nullable();
            $table->string('version')->nullable();
            $table->longText('description')->nullable();
            $table->longText('thumbnail')->charset('binary')->nullable(); // LONGBLOB
            $table->string('originalFileName')->nullable();
            $table->string('shortcut')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};

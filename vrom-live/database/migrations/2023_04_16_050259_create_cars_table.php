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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();
            $table->text('features')->nullable();
            $table->double('rating')->nullable();
            $table->integer('review')->nullable();
            $table->text('photo')->nullable();
            $table->string('license_plate')->nullable();

            // Relation to Other Tables
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('type_id')->constrained();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

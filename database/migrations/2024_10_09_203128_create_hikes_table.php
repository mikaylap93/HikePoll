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
        Schema::create('hikes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('miles');
            $table->integer('steepness');
            $table->unsignedBigInteger('difficulty_id');
            $table->foreign('difficulty_id')
                ->references('id')
                ->on('difficulties')
                ->onDelete('cascade');

            $table->tinyInteger('recommend');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hikes');
    }
};

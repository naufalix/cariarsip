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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rack_id');
            $table->foreign('rack_id')->references('id')->on('racks')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->integer('year');
            $table->string('outner')->unique();
            $table->string('recap')->nullable();
            // $table->text('description');
            // $table->string('category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

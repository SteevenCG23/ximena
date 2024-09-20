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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dietId')->nullable();// Foreign key
            $table->foreign('dietId')->references('id')->on('diets')->onDelete('set null');
            $table->string('name');
            $table->integer('studentId')->unique();
            $table->integer('age');
            $table->string('grade');
            $table->timestamps();
            $table->string('status')->default('activo');//The column's default value is "active"
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

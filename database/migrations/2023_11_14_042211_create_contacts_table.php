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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 128);
            $table->string('last_name', 128);
            $table->string('number', 13);
            $table->string('number_type', 32)->nullable();
            $table->string('email', 128);
            $table->string('email_type', 32)->nullable();
            $table->string('notes', 256)->nullable();
            $table->string('address', 128)->nullable(); 
            $table->string('photo', 128)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};

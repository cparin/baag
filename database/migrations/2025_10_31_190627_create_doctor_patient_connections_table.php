<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_create_doctor_patient_connections_table.php
    public function up()
    {
        Schema::create('doctor_patient_connections', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique();
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('doctor_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->enum('status', ['pending', 'active', 'revoked'])->default('pending');
            $table->timestamp('expires_at');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_patient_connections');
    }
};

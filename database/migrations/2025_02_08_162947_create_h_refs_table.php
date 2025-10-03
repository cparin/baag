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
        Schema::create('h_refs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('age');
            $table->string('a2_00');
            $table->string('a2_01');
            $table->string('a2_02');
            $table->string('a2_03');
            $table->string('a2_04');
            $table->string('a2_05');
            $table->string('a2_06');
            $table->string('a2_07');
            $table->string('a2_08');
            $table->string('a2_09');
            $table->string('a2_10');
            $table->string('a2_11');
            $table->string('a3_00');
            $table->string('a3_01');
            $table->string('a3_02');
            $table->string('a3_03');
            $table->string('a3_04');
            $table->string('a3_05');
            $table->string('a3_06');
            $table->string('a3_07');
            $table->string('a3_08');
            $table->string('a3_09');
            $table->string('a3_10');
            $table->string('a3_11');
            $table->string('a4_00');
            $table->string('a4_01');
            $table->string('a4_02');
            $table->string('a4_03');
            $table->string('a4_04');
            $table->string('a4_05');
            $table->string('a4_06');
            $table->string('a4_07');
            $table->string('a4_08');
            $table->string('a4_09');
            $table->string('a4_10');
            $table->string('a4_11');
            $table->string('a5_00');
            $table->string('a5_01');
            $table->string('a5_02');
            $table->string('a5_03');
            $table->string('a5_04');
            $table->string('a5_05');
            $table->string('a5_06');
            $table->string('a5_07');
            $table->string('a5_08');
            $table->string('a5_09');
            $table->string('a5_10');
            $table->string('a5_11');





//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h_refs');
    }
};

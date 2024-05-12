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
        Schema::create('made_to_measure', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 255);
            $table->string('email');
            $table->string('phone_number', 10);
            $table->integer('height');
            $table->integer('bust_circumference');
            $table->integer('circumference_under_the_bust');
            $table->integer('waist_circumference');
            $table->integer('hips_circumference');
            $table->integer('arm_length');
            $table->integer('inside_length_leg');
            $table->integer('shoulder_width');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('made_to_measure');
    }
};

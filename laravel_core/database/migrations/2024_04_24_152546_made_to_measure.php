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
            $table->string('phoneNumber', 10);
            $table->integer('height');
            $table->integer('bustCircumference');
            $table->integer('circumferenceUnderTheBust');
            $table->integer('waistCircumference');
            $table->integer('hipsCircumference');
            $table->integer('armLength');
            $table->integer('insideLengthLeg');
            $table->integer('shoulderWidth');
            $table->binary('photo1');
            $table->binary('photo2');
            $table->binary('photo3');
            $table->boolean('finished');
            $table->timestamp('placedAt')->useCurrent();
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

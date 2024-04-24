<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateAccountLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_account_links', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('token');
            $table->string('generated_by');
            $table->timestamp('generated_at')->useCurrent();
            $table->timestamp('expiration_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_account_links');
    }
}

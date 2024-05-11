<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("DROP EVENT IF EXISTS `DeleteLinks`; CREATE EVENT `DeleteLinks` ON SCHEDULE EVERY 1 MINUTE STARTS '2024-05-01 23:59:00' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM create_account_links WHERE create_account_links.expiration_at >= CURRENT_TIMESTAMP()");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP EVENT IF EXIST `DeleteLinks`");
    }
};

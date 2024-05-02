<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("DROP EVENT IF EXISTS `InsertVisitDay`; CREATE DEFINER=`root`@`localhost` EVENT `InsertVisitDay` ON SCHEDULE EVERY 1 DAY STARTS '2024-05-01 23:59:00' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO visits (report_day, total_visits) VALUE (CURRENT_DATE() + INTERVAL 1 DAY, 0)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP EVENT IF EXISTS `InsertVisitDay`");
    }
};

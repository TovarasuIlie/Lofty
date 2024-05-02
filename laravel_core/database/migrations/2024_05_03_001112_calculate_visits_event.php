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
        DB::unprepared("DROP EVENT IF EXISTS `CalculateTotalVisits`; CREATE DEFINER=`root`@`localhost` EVENT `CalculateTotalVisits` ON SCHEDULE EVERY 10 MINUTE STARTS '2024-05-01 23:59:59' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN UPDATE visits SET visits.total_visits = visits.total_visits + (SELECT COUNT(*) FROM visitors_tracker WHERE visitors_tracker.visited_at = CURRENT_DATE()) WHERE visits.report_day = CURRENT_DATE(); DELETE FROM visitors_tracker; END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('"DROP EVENT IF EXISTS `CalculateTotalVisits`');
    }
};

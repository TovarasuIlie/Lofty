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
        DB::unprepared("DROP EVENT IF EXISTS `CalculateTotalVisits`; CREATE EVENT `CalculateTotalVisits` ON SCHEDULE EVERY 10 MINUTE STARTS '2024-05-01 23:59:59' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE visits SET visits.total_visits = visits.total_visits + (SELECT COUNT(*) FROM visitors_tracker WHERE visitors_tracker.visited_at BETWEEN CURRENT_TIMESTAMP() - INTERVAL 10 MINUTE AND CURRENT_TIMESTAMP()) WHERE visits.report_day = CURRENT_DATE()");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP EVENT IF EXISTS `CalculateTotalVisits`');
    }
};

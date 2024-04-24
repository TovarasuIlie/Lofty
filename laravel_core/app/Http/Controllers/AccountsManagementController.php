<?php

namespace App\Http\Controllers;

use App\Models\StaffLogs;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AccountsManagementController extends Controller
{
    public function viewPage(): View {
        $staffMembers = DB::select("CALL ReturnStaffMembers()");
        return view("dashboard/account-management/account-management", ['staffMembers' => $staffMembers]);
    }

    public function viewAccountPage($id): View {
        $staffMember = DB::select("CALL ReturnStaffMember(?)", array($id));
        return view("dashboard/account-management/account-details", ['staffMember' => $staffMember[0]]);
    }

    public function viewAccountLogsPage($id): View {
        $staffLogsModel = new StaffLogs();
        $staffLogs = $staffLogsModel->where('idStaff', $id)->paginate(50);
        return view("dashboard/account-management/account-logs", ['staffLogs' => $staffLogs]);
    }

}

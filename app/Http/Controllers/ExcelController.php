<?php

namespace App\Http\Controllers;

use App\Exports\UserEventsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class ExcelController extends Controller
{
    public function previewEvents()
        {
            $users = User::all();
            return Excel::download(new UserEventsExport($users), 'user_events.xlsx', \Maatwebsite\Excel\Excel::XLSX, [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'inline; filename="user_events.xlsx"'
            ]);
        }
}

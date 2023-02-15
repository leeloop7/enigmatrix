<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Event;

class EventExport implements FromCollection, WithTitle
{
    use Exportable;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function collection()
    {
        return $this->user->events;
    }

    public function title(): string
    {
        return $this->user->name;
    }
}

class EventExportController extends Controller
{
    public function export()
    {
        // Get all users
        $users = User::all();

        // Create a new Excel file
        $excel = \App::make('excel');

        // Loop through each user and add their events to the Excel file
        foreach ($users as $user) {
            $excel->store(new EventExport($user), $user->name . '.xlsx', 'excel');
        }

        // Zip all the Excel files into one archive
        $zip = new \ZipArchive();
        $zip->open('events.zip', \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        foreach ($users as $user) {
            $zip->addFile(storage_path('app/excel/' . $user->name . '.xlsx'), $user->name . '.xlsx');
        }

        $zip->close();

        // Download the zip archive
        return response()->download(public_path('events.zip'))->deleteFileAfterSend();

    }
}

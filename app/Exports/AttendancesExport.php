<?php
namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;


class AttendancesExport implements FromCollection
{
    public function collection()
    {
        return Attendance::all();
    }
}
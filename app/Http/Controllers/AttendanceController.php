<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Attendance;
use Illuminate\Support\Facades\Log;
use App\Exports\AttendancesExport;
use Maatwebsite\Excel\Facades\Excel;
// could not make it to make snappy work, it require
// downloading some binary and to my research on amd64 machine is only disto
// supported and I don't have it.
// use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Validator;

class AttendanceController extends Controller
{

    // store method to create a new attendance record


    public function store(Request $request)
    {
        // log the request to the console
        Log::info('Request data: ', $request->all());

        $validator = Validator::make($request->all(), [
            "arrivalTime" => "required",
            "departureTime" => "required",
            "employeeId" => "required",
        ]);

        if ($validator->fails()) {
            return Inertia::render('Dashboard', [
                'errors' => $validator->errors()->getMessages(),
            ])->with('flash', 'There were errors with your request.');
        }

        $attendance = new Attendance;
        $attendance->employee_id = $request->employeeId;
        $attendance->arrival_time = $request->arrivalTime;
        $attendance->departure_time = $request->departureTime;
        $attendance->save();

        return redirect()->back()->with('message', 'Attendance recorded successfully');
    }
    // method to get all attendance records
    public function index()
    {
        $attendances = Attendance::all();

        return response()->json($attendances);
    }


    public function exportExcel()
    {
        return Excel::download(new AttendancesExport, 'attendance.xlsx');
    }




    public function exportPdf()
    {
        $attendances = Attendance::all();

        $html = view('pdf.attendances', ['attendances' => $attendances])->render();

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf(new Options(['defaultFont' => 'Arial']));

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        return $dompdf->stream('attendances.pdf');
    }

}
<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function showReports()
    {
        $reports = Report::all();
        return view('technician-views.reports', compact('reports'));
    }

    public function showAddReportForm()
    {
        $patients = User::all();
        return view('technician-views.add-report-form', compact('patients'));
    }

    public function addReport(Request $request)
    {
        // return $request;

        $request->validate([
            'user_id' => 'required|integer',
            'report_file' => 'required|mimes:pdf',
        ]);

        if ($request->hasfile('report_file')) {
            $report_file = $request->file('report_file')->store('patient_report_files');
            $report = new Report();
            $report->user()->associate($request->user_id);
            $report->file_path = $report_file;
            $report->save();

            return redirect()->back()->with('success', "Report Added Successfully.");
        }
    }

    public function viewReportFile(Report $report)
    {
        $report_file = $report->file_path;
        if (Storage::exists($report_file)) {

            $file = Storage::url($report_file);
            // $file = 'http://192.168.43.214:8000'.$file_path;
            // return $file;
            return view('technician-views.view-report-file', compact('file'));
        }
        return redirect()->back()->with('error', 'File Not Found');
    }
}

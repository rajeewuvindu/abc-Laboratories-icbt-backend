<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function showReports()
    {
        $reports = Report::all();
        return view('admin-views.reports', compact('reports'));
    }

    public function viewReportFile(Report $report)
    {
        $report_file = $report->file_path;
        if (Storage::exists($report_file)) {

            $file = Storage::url($report_file);
            // $file = 'http://192.168.43.214:8000'.$file_path;
            // return $file;
            return view('admin-views.view-report-file', compact('file'));
        }
        return redirect()->back()->with('error', 'File Not Found');
    }
}

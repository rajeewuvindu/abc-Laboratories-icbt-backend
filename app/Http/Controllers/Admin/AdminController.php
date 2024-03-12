<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin-views.dashboard');
    }

    public function showAppointments()
    {
        // $appin
        return view('admin-views.appointments');
    }

    public function showPatients()
    {
        return view('admin-views.patients');
    }


    public function showReports()
    {
        return view('admin-views.reports');
    }

    public function user()
    {
        return "PAK U";
    }
}

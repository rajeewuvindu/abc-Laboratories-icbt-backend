<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    public function showTechnicians()
    {
        $technicians = Technician::all();
        return view('admin-views.technicians', compact('technicians'));
    }

    public function showAddTechnicianForm()
    {
        return view('admin-views.add-technician-form');
    }

    public function AddTechnician(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|unique:technicians,email',
            'name' => 'required|string',
        ]);

        $technician = new Technician();
        $technician->name = $request->name;
        $technician->email = $request->email;
        $technician->status = 'active';
        $technician->save();

        if ($technician) {
            return redirect()->back()->with('success', "Technician Added Successfully");
        } else {
            return redirect()->back()->with('error', "Failed to add Technician");
        }
        // return $request;
    }

    public function showEditTechnicianForm(Technician $technician)
    {
        return view('admin-views.edit-technician-form', compact('technician'));
    }

    public function updateTechnician(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'name' => 'required|string',
        ]);


        $technician = Technician::find($request->id);

        if ($technician->email != $request->email) {
            $duplicates = Technician::where('email', $request->email)->count();

            if ($duplicates > 0) {
                return redirect()->back()->with('error', 'The email has already been taken.');
            }
        }

        $technician->name = $request->name;
        $technician->email = $request->email;
        $technician->save();

        if ($technician) {
            return redirect()->back()->with('success', "Changes Saved Successfully");
        } else {
            return redirect()->back()->with('error', "Failed to edit Technician");
        }
    }

    public function removeTechnician(Technician $technician)
    { 
        if ($technician) {
            $technician->status = 'deleted';
            $technician->save();

            if ($technician) {
                return redirect()->back()->with('success', "Technician Deleted Successfully");
            } else {
                return redirect()->back()->with('error', "Failed to delete Technician");
            }
        }
    }
}

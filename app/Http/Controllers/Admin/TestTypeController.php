<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TestType;
use Illuminate\Http\Request;

class TestTypeController extends Controller
{
    public function showTestTypes()
    {
        $test_types = TestType::all();
        return view('admin-views.test-types', compact('test_types'));
    }

    public function showAddTestTypeForm()
    {
        return view('admin-views.add-test-type-form');
    }

    public function AddTestType(Request $request)
    {
        $request->validate([
            'test_type' => 'required|string',
        ]);

        $test_type = new TestType();
        $test_type->test_type = $request->test_type;
        $test_type->status = 'active';
        $test_type->save();

        if ($test_type) {
            return redirect()->back()->with('success', "Test Type Added Successfully");
        } else {
            return redirect()->back()->with('error', "Failed to add Test Type");
        }
        // return $request;
    }

    public function showEditTestTypeForm(TestType $test_type)
    {
        return view('admin-views.edit-test-type-form', compact('test_type'));
    }

    public function updateTestType(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'test_type' => 'required|string',
        ]);

        $test_type = TestType::find($request->id);

        $test_type->test_type = $request->test_type;
        $test_type->save();

        if ($test_type) {
            return redirect()->back()->with('success', "Changes Saved Successfully");
        } else {
            return redirect()->back()->with('error', "Failed to edit Test Type");
        }
    }
    public function removeTestType(TestType $test_type)
    {
        if ($test_type) {
            $test_type->status = 'deleted';
            $test_type->save();

            if ($test_type) {
                return redirect()->back()->with('success', "Test Type Deleted Successfully");
            } else {
                return redirect()->back()->with('error', "Failed to delete Test Type");
            }
        }
    }
}

<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function view()
    {
        $data = StudentShift::all();
        return view('backend.setups.shift.shift_view', compact('data'));
    }

    public function create()
    {
        return view('backend.setups.shift.shift_create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //Validate forms
        $request->validate([
            "name" => 'required|unique:student_shifts,name',
        ]);

        $shift = new StudentShift();
        $shift->name = $request->name;
        $save = $shift->save();

        if ($save) {
            return redirect()->back()->with('success', 'A shift saved successfully');
        } else {
            return redirect()->back()->with('fail', 'Something wrong !');
        }
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $shift = StudentShift::find($id);
        return view('backend.setups.shift.shift_edit', compact('shift'));
    }

    /**
     * @param Request $request
     */
    public function update(Request $request, $id)
    {
        //Validate forms
        $shift = StudentShift::find($id);
        $request->validate([
            "name" => 'required|unique:student_shifts,name',
        ]);
        $shift->name = $request->name;
        $save = $shift->update();

        if ($save) {
            return redirect()->back()->with('success', 'Shift updated successfully');
        } else {
            return redirect()->back()->with('fail', 'Shift not updated !');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $shift = StudentShift::find($id);
        $Ok = $shift->delete();
        if ($Ok) {
            return redirect()->back()->with('success', 'Data deleted successfully.');
        } else {
            return redirect()->back()->with('fail', 'Data is not deleted!');
        }
    }
}

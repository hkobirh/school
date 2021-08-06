<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{

    public function view()
    {
        $data = Designation::all();
        return view('backend.setups.designation.designation_view', compact('data'));
    }


    public function create()
    {
        return view('backend.setups.designation.designation_create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //Validate forms
        $request->validate([
            "name" => 'required|unique:designations,name',
        ]);

        $designation = new Designation();
        $designation->name = $request->name;
        $save = $designation->save();

        if ($save) {
            return redirect()->back()->with('success', 'The designation saved successfully');
        } else {
            return redirect()->back()->with('fail', 'Something wrong !');
        }
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $designation = Designation::find($id);
        return view('backend.setups.designation.designation_edit', compact('designation'));
    }

    /**
     * @param Request $request
     */
    public function update(Request $request, $id)
    {
        //Validate forms
        $designation = Designation::find($id);
        $request->validate([
            "name" => 'required|unique:designations,name',
        ]);
        $designation->name = $request->name;
        $save = $designation->update();

        if ($save) {
            return redirect()->back()->with('success', 'The designation updated successfully');
        } else {
            return redirect()->back()->with('fail', 'The designation not updated successfully !');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $designation = Designation::find($id);
        $save = $designation->delete();
        if ($save) {
            return redirect()->back()->with('success', 'Data deleted successfully.');
        } else {
            return redirect()->back()->with('fail', 'Data is not deleted!');
        }
    }
}

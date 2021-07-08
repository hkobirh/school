<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{

    public function view()
    {
        $data = Year::all();
        return view('backend.setups.year.year_view', compact('data'));
    }


    public function create()
    {
        return view('backend.setups.year.year_create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //Validate forms
        $request->validate([
            "name" => 'required|unique:years,name',
        ]);

        $year = new Year();
        $year->name = $request->name;
        $save = $year->save();

        if ($save) {
            return redirect()->back()->with('success', 'A year saved successfully');
        } else {
            return redirect()->back()->with('fail', 'Something wrong !');
        }
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $year = Year::find($id);
        return view('backend.setups.year.year_edit', compact('year'));
    }

    /**
     * @param Request $request
     */
    public function update(Request $request, $id)
    {
        //Validate forms
        $year = Year::find($id);
        $request->validate([
            "name" => 'required|unique:years,name',
        ]);
        $year->name = $request->name;
        $save = $year->update();

        if ($save) {
            return redirect()->back()->with('success', 'A year updated successfully');
        } else {
            return redirect()->back()->with('fail', 'The year not updated successfully !');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $year = Year::find($id);
        $Ok = $year->delete();
        if ($Ok) {
            return redirect()->back()->with('success', 'Data deleted successfully.');
        } else {
            return redirect()->back()->with('fail', 'Data is not deleted!');
        }
    }
}

<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Subjects;
use Illuminate\Http\Request;


class SubjectsController extends Controller
{
    public function view()
    {
        $data =Subjects::all();
        return view('backend.setups.subject.subject_view', compact('data'));
    }
    public function create()
    {
        return view('backend.setups.subject.subject_create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //Validate forms
        $request->validate([
            "name" => 'required|unique:subjects,name',
        ]);

        $subject = new Subjects();
        $subject->name = $request->name;
        $save = $subject->save();

        if ($save) {
            return redirect()->back()->with('success', 'A added successfully');
        } else {
            return redirect()->back()->with('fail', 'Subject is not added !');
        }
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $subject = Subjects::find($id);
        return view('backend.setups.subject.subject_edit', compact('subject'));
    }

    /**
     * @param Request $request
     */
    public function update(Request $request, $id)
    {
        //Validate forms
        $subject = Subjects::find($id);
        $request->validate([
            "name" => 'required|unique:subjects,name',
        ]);
        $subject->name = $request->name;
        $save = $subject->update();

        if ($save) {
            return redirect()->back()->with('success', 'A subject updated successfully');
        } else {
            return redirect()->back()->with('fail', 'Subject not updated!');
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

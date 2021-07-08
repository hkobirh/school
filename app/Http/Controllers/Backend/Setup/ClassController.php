<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function view()
    {
        $data = StudentClass::all();
        return view('backend.setups.class.class_view', compact('data'));
    }

    public function create()
    {
        return view('backend.setups.class.class_create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //Validate forms
        $request->validate([
            "name" => 'required|unique:student_classes,name',
        ]);

        $class = new StudentClass();
        $class->name = $request->name;
        $save = $class->save();

        if ($save) {
            return redirect()->back()->with('success', 'A class saved successfully');
        } else {
            return redirect()->back()->with('fail', 'Something wrong !');
        }
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $class = StudentClass::find($id);
        return view('backend.setups.class.class_edit', compact('class'));
    }

    /**
     * @param Request $request
     */
    public function update(Request $request, $id)
    {
        //Validate forms
        $class = StudentClass::find($id);
        $request->validate([
            "name" => 'required|unique:student_classes,name',
        ]);
        $class->name = $request->name;
        $save = $class->update();

        if ($save) {
            return redirect()->back()->with('success', 'A class updated successfully');
        } else {
            return redirect()->back()->with('fail', 'The class not updated successfully');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $student = StudentClass::find($id);
        $Ok = $student->delete();
        if ($Ok) {
            return redirect()->back()->with('success', 'Data deleted successfully.');
        } else {
            return redirect()->back()->with('fail', 'Data is not deleted!');
        }
    }
}

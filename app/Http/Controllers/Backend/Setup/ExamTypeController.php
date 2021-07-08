<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{

    public function view()
    {
        $data = ExamType::all();
        return view('backend.setups.exam-type.exam_type_view', compact('data'));
    }


    public function create()
    {
        return view('backend.setups.exam-type.exam_type_create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //Validate forms
        $request->validate([
            "name" => 'required|unique:exam_types,name',
        ]);

        $exam = new ExamType();
        $exam->name = $request->name;
        $save = $exam->save();

        if ($save) {
            return redirect()->back()->with('success', 'An exam type saved successfully');
        } else {
            return redirect()->back()->with('fail', 'Something wrong !');
        }
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $exam = ExamType::find($id);
        return view('backend.setups.exam-type.exam_type_edit', compact('exam'));
    }

    /**
     * @param Request $request
     */
    public function update(Request $request, $id)
    {
        //Validate forms
        $exam = ExamType::find($id);
        $request->validate([
            "name" => 'required|unique:exam_types,name',
        ]);
        $exam->name = $request->name;
        $save = $exam->update();

        if ($save) {
            return redirect()->back()->with('success', 'Exam type updated successfully');
        } else {
            return redirect()->back()->with('fail', 'Exam type not updated!');
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

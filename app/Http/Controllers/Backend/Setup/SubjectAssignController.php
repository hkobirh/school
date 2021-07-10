<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class SubjectAssignController extends Controller
{
    public function view()
    {
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setups.assign-subject.assign_subject_view', $data);
    }

    public function create()
    {

        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setups.assign-subject.assign_subject_create', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $subjectId = $request->subject_id;
        $countSubject = count($subjectId);
        if ($countSubject) {
            for ($i = 0; $i < $countSubject; $i++) {
                $assignSubject = new AssignSubject();
                $assignSubject->class_id = $request->class_id;
                $assignSubject-> subject_id = $request->subject_id[$i];
                $assignSubject->full_mark = $request->full_mark[$i];
                $assignSubject->pass_mark = $request->pass_mark[$i];
                $assignSubject->subjective_mark = $request->subjective_mark[$i];
                $save = $assignSubject->save();
            }
        }
        if ($save) {
            return redirect()->route('setup.subject.assign.view')->with('success', 'Subject assigned successfully');
        } else {
            return redirect()->back()->with('fail', 'Something wrong !');
        }
    }

    /**
     * @param $id
     */
    public function edit($class_id)
    {

        $data['editData'] = AssignSubject::where('class_id',$class_id)->get();
        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setups.assign-subject.assign_subject_edit', $data);
    }

    /**
     * @param Request $request
     */
    public function update(Request $request, $class_id)
    {
        if ($request->subject_id == NULL) {
            return redirect()->back()->with('errors', 'Sorry, you dont have any subject !');
        } else {
            AssignSubject::where('class_id', $class_id)->delete();
            $countSubject = count($request->subject_id);
            for ($i = 0; $i < $countSubject; $i++) {
                $assignSubject = new AssignSubject();
                $assignSubject->class_id = $request->class_id;
                $assignSubject-> subject_id = $request->subject_id[$i];
                $assignSubject->full_mark = $request->full_mark[$i];
                $assignSubject->pass_mark = $request->pass_mark[$i];
                $assignSubject->subjective_mark = $request->subjective_mark[$i];
                $save = $assignSubject->save();
            }
        }
        if ($save) {
            return redirect()->route('setup.subject.assign.view')->with('success', 'Assign subject updated successfully');
        } else {
            return redirect()->back()->with('fail', 'Something wrong !');
        }
    }

    /**
     * @param $fee_category_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function details($class_id)
    {
        $data['editData'] = AssignSubject::where('class_id', $class_id)->get();
        return view('backend.setups.assign-subject.assign_subject_details', $data);
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

<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\Student\AssignStudent;
use App\Models\StudentClass;
use App\Models\Year;
use Illuminate\Http\Request;

class StudentRollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roll_create()
    {
        $data['years'] = Year::orderBy('id', 'DESC')->get();
        $data['classes'] = StudentClass::all();
        return view('backend.students.student-roll.roll_generate', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function roll_store(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if ($request->student_id != null) {
            for ($i = 0; $i < count($request->student_id); $i++) {
             AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])
                 ->update(['roll'=>$request->roll[$i]]);

            }
        }else{
            return redirect()->back()->with('error','Sorry! There is no student !');
        }
        return redirect()->route('student.roll.create')->with('success','Successfully roll generated.');
    }

    public function getStudent(Request $request)
    {
        $getStudent = AssignStudent::with('student')->where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();
        return response()->json($getStudent);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

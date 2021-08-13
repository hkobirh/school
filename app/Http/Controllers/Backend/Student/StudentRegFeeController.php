<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\Student\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentFeeAmount;
use App\Models\Year;
use Illuminate\Http\Request;

class StudentRegFeeController extends Controller
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
    public function create()
    {
        $data['years'] = Year::orderBy('id', 'DESC')->get();
        $data['classes'] = StudentClass::all();
        return view('backend.students.student-reg-fee.reg-fee-view', $data);
    }

    public function getStudent(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;

        if ($year_id != '') {
            $where[] = ['year_id', 'like', $year_id . '%'];
        }
        if ($class_id != '') {
            $where[] = ['class_id', 'like', $class_id . '%'];
        }

        $allStudent = AssignStudent::with('discount')->where($where)->get();


        $html['thsource'] = '<th> SL </th>';
        $html['thsource'] .= '<th> Id No </th>';
        $html['thsource'] .= '<th> Student Name </th>';
        $html['thsource'] .= '<th> Roll No </th>';
        $html['thsource'] .= '<th> Registration Fee </th>';
        $html['thsource'] .= '<th> Discount Amount </th>';
        $html['thsource'] .= '<th> Fee (This student) </th>';
        $html['thsource'] .= '<th> Action </th>';

        foreach ($allStudent as $key => $v) {
            $regFee = StudentFeeAmount::where('fee_category_id', '1')->where('class_id', $v->class_id)->first();
            $color = 'success';
            $html[$key]['tdsource'] = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['student']['id_no'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['student']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v->roll . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $regFee->amount . 'TK' . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['discount']['discount'] . '%' . '</td>';

            $originalRegFee = $regFee->amount;
            $discount = $v['discount']['discount'];
            $discountAbleFee = $discount / 100 * $originalRegFee;
            $finalRegFee = (int)$originalRegFee - (int)$discountAbleFee;

            $html[$key]['tdsource'] .= '<td>' . $finalRegFee . 'TK' . '</td>';
            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-' . $color . '" title="Payslip" target="_blank" href="' .
                route("student.reg.fee.payslip") . '? class_id = ' . $v->class_id . '&student_id = ' . $v->student_id . '"> Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';
            return response()->json(@$html);
        }
    }

    public function payslip()
    {
        dd('Payslip');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

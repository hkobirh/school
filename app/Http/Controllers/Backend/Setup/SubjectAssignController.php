<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectAssignController extends Controller
{
    public function view()
    {
        $data['classId'] = StudentClass::all();
        $data['feeCategories'] = StudentFeeCategory::all();
        $data['feeAmount'] = StudentFeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setups.fee-amount.fee_amount_view', $data);
    }

    public function create()
    {
        $data['feeCategories'] = StudentFeeCategory::all();
        $data['className'] = StudentClass::all();
        return view('backend.setups.fee-amount.fee_amount_create', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $classId = $request->class_id;
        $countClass = count($classId);
        if ($countClass) {
            for ($i = 0; $i < $countClass; $i++) {
                $feeAmount = new StudentFeeAmount();
                $feeAmount->fee_category_id = $request->fee_category_id;
                $feeAmount->class_id = $request->class_id[$i];
                $feeAmount->amount = $request->amount[$i];
                $save = $feeAmount->save();
            }
        }
        if ($save) {
            return redirect()->route('setup.fee.amount.view')->with('success', 'The amount saved successfully');
        } else {
            return redirect()->back()->with('fail', 'Something wrong !');
        }
    }

    /**
     * @param $id
     */
    public function edit($fee_category_id)
    {
        $data['editData'] = StudentFeeAmount::where('fee_category_id', $fee_category_id)->get();
        $data['fee_category'] = StudentFeeCategory::all();
        $data['clasess'] = StudentClass::all();
        return view('backend.setups.fee-amount.fee_amount_edit', $data);
    }

    /**
     * @param Request $request
     */
    public function update(Request $request, $fee_category_id)
    {
        if ($request->class_id == NULL) {
            return redirect()->back()->with('errors', 'Sorry, you dont have any item!');
        } else {
            StudentFeeAmount::where('fee_category_id', $fee_category_id)->delete();
            $countClass = count($request->class_id);
            for ($i = 0; $i < $countClass; $i++) {
                $feeAmount = new StudentFeeAmount();
                $feeAmount->fee_category_id = $request->fee_category_id;
                $feeAmount->class_id = $request->class_id[$i];
                $feeAmount->amount = $request->amount[$i];
                $save = $feeAmount->save();
            }
        }
        if ($save) {
            return redirect()->route('setup.fee.amount.view')->with('success', 'The update successfully');
        } else {
            return redirect()->back()->with('fail', 'Something wrong !');
        }
    }

    /**
     * @param $fee_category_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function details($fee_category_id)
    {
        $data['amountDetails'] = StudentFeeAmount::where('fee_category_id', $fee_category_id)->get();
        return view('backend.setups.fee-amount.fee_amount_details', $data);
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

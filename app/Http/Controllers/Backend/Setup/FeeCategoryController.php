<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentFeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function view()
    {
        $feeCategory = StudentFeeCategory::all();
        return view('backend.setups.fee-category.fee_category_view', compact('feeCategory'));
    }

    public function create()
    {
        return view('backend.setups.fee-category.fee_category_create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //Validate forms
        $request->validate([
            "name" => 'required|unique:student_fee_categories,name',
        ]);

        $studentFee = new StudentFeeCategory();
        $studentFee->name = $request->name;
        $save = $studentFee->save();

        if ($save) {
            return redirect()->back()->with('success', 'Student fee category saved successfully');
        } else {
            return redirect()->back()->with('fail', 'Something wrong !');
        }
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $studentFee = StudentFeeCategory::find($id);
        return view('backend.setups.fee-category.fee_category_edit', compact('studentFee'));
    }

    /**
     * @param Request $request
     */
    public function update(Request $request, $id)
    {
        //Validate forms
        $studentFee = StudentFeeCategory::find($id);
        $request->validate([
            "name" => 'required|unique:student_fee_categories,name',
        ]);
        $studentFee->name = $request->name;
        $save = $studentFee->update();

        if ($save) {
            return redirect()->back()->with('success', 'Student fee category updated successfully');
        } else {
            return redirect()->back()->with('fail', 'Student fee category not updated successfully');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $studentFee = StudentFeeCategory::find($id);
        $Ok = $studentFee->delete();
        if ($Ok) {
            return redirect()->back()->with('success', 'Data deleted successfully.');
        } else {
            return redirect()->back()->with('fail', 'Data is not deleted!');
        }
    }
}

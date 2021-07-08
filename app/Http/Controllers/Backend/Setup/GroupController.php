<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function view()
    {
        $data = StudentGroup::all();
        return view('backend.setups.group.group_view', compact('data'));
    }

    public function create()
    {
        return view('backend.setups.group.group_create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //Validate forms
        $request->validate([
            "name" => 'required|unique:student_groups,name',
        ]);

        $group = new StudentGroup();
        $group->name = $request->name;
        $save = $group->save();

        if ($save) {
            return redirect()->back()->with('success', 'A Student group created successfully');
        } else {
            return redirect()->back()->with('fail', 'Something wrong !');
        }
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $group = StudentGroup::find($id);
        return view('backend.setups.group.group_edit', compact('group'));
    }

    /**
     * @param Request $request
     */
    public function update(Request $request, $id)
    {
        //Validate forms
        $group = StudentGroup::find($id);
        $request->validate([
            "name" => 'required|unique:student_groups,name',
        ]);
        $group->name = $request->name;
        $save = $group->update();

        if ($save) {
            return redirect()->back()->with('success', 'Student group updated successfully');
        } else {
            return redirect()->back()->with('fail', 'Student group not updated !');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $group = StudentGroup::find($id);
        $Ok = $group->delete();
        if ($Ok) {
            return redirect()->back()->with('success', 'Data deleted successfully.');
        } else {
            return redirect()->back()->with('fail', 'Data is not deleted!');
        }
    }
}

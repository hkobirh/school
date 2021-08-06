<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\Student\AssignStudent;
use App\Models\Student\DiscountStudent;
use App\Models\Student\Registration;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\User;
use App\Models\Year;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Exception;

class StudentRegController extends Controller
{
    public function view()
    {
        $data['years'] = Year::orderBy('id', 'DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['year_id'] = Year::orderBy('id', 'DESC')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id', 'asc')->first()->id;
        $data['allData'] = AssignStudent::where('year_id', $data['year_id'])->where('class_id', $data['class_id'])->get();
        return view('backend.students.student-reg.reg_view', $data);
    }

    public function yearClassWise(Request $request)
    {
        $data['years'] = Year::orderBy('id', 'DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;
        $data['allData'] = AssignStudent::where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();
        return view('backend.students.student-reg.reg_view', $data);
    }

    public function create()
    {

        $data['years'] = Year::orderBy('id', 'DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        return view('backend.students.student-reg.reg_create', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required',
            'f_name'            => 'required',
            'm_name'            => 'required',
            'mobile'            => 'required',
            'present_address'   => 'required',
            'permanent_address' => 'required',
            'gender'            => 'required',
            'religion'          => 'required',
            'dob'               => 'required',
            'year_id'           => 'required',
            'class_id'          => 'required',
            'image'             => 'required',
        ]);
        try {
            DB::transaction(function () use ($request) {
                $checkYear = Year::find($request->year_id)->name;
                $student = User::where('usertype', 'student')->orderBy('id', 'DESC')->first();
                if ($student == NULL) {
                    $firstReg = 0;
                    $studentId = $firstReg + 1;
                    if ($studentId < 10) {
                        $id_no = '000' . $studentId;
                    } elseif ($studentId < 100) {
                        $id_no = '00' . $studentId;
                    } elseif ($studentId < 1000) {
                        $id_no = '0' . $studentId;
                    }
                } else {
                    $student = User::where('usertype', 'student')->orderBy('id', 'DESC')->first()->id;
                    $studentId = $student + 1;
                    if ($studentId < 10) {
                        $id_no = '000' . $studentId;
                    } elseif ($studentId < 100) {
                        $id_no = '00' . $studentId;
                    } elseif ($studentId < 1000) {
                        $id_no = '0' . $studentId;
                    }
                }
                $lastId_no = $checkYear . $id_no;
                $code = rand(0000, 9999);
                $newUser = new User();
                $newUser->id_no = $lastId_no;
                $newUser->usertype = 'student';
                $newUser->password = bcrypt($code);
                $newUser->code = $code;
                $newUser->name = $request->name;
                $newUser->f_name = $request->f_name;
                $newUser->m_name = $request->m_name;
                $newUser->mobile = $request->mobile;
                $newUser->present_address = $request->present_address;
                $newUser->permanent_address = $request->permanent_address;
                $newUser->gender = $request->gender;
                $newUser->status = 1;
                $newUser->religion = $request->religion;
                $newUser->dob = date('Y-m-d', strtotime($request->dob));
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $fileName = date('YmdHi.') . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/students_image'), $fileName);
                    $newUser['image'] = $fileName;
                }
                $newUser->save();

                $assignStudent = new AssignStudent();
                $assignStudent->student_id = $newUser->id;
                $assignStudent->year_id = $request->year_id;
                $assignStudent->class_id = $request->class_id;
                $assignStudent->group_id = $request->group_id;
                $assignStudent->shift_id = $request->shift_id;
                $assignStudent->save();

                $discountStudent = new DiscountStudent();
                $discountStudent->assign_student_id = $assignStudent->id;
                $discountStudent->fee_category_id = 1;
                $discountStudent->discount = $request->discount;
                $discountStudent->save();
            });
            return redirect()->back()->with('success', 'The user created successfully');
        } catch (Exception $e) {

            return redirect()->back()->with('fail', 'The user dose not created');
        }
    }

    public function edit($student_id)
    {
        $data['editData'] = AssignStudent::with('student', 'discount')->where('student_id', $student_id)->first();
        $data['years'] = Year::orderBy('id', 'DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        return view('backend.students.student-reg.reg_edit', $data);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    function update(Request $request, $student_id)
    {

        $request->validate([
            'name'              => 'required',
            'f_name'            => 'required',
            'm_name'            => 'required',
            'mobile'            => 'required',
            'present_address'   => 'required',
            'permanent_address' => 'required',
            'gender'            => 'required',
            'religion'          => 'required',
            'dob'               => 'required',
            'year_id'           => 'required',
            'class_id'          => 'required',
            'image'             => 'required',
        ]);
        try {
            DB::transaction(function () use ($request, $student_id) {

                $user = User::find($student_id);
                $user->name = $request->name;
                $user->f_name = $request->f_name;
                $user->m_name = $request->m_name;
                $user->mobile = $request->mobile;
                $user->present_address = $request->present_address;
                $user->permanent_address = $request->permanent_address;
                $user->gender = $request->gender;
                $user->status = 1;
                $user->religion = $request->religion;
                $user->dob = date('Y-m-d', strtotime($request->dob));
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $fileName = date('YmdHi.') . $file->getClientOriginalExtension();
                    unlink(public_path('uploads/students_image/' . $user->image));
                    $file->move(public_path('uploads/students_image'), $fileName);
                    $user->image = $fileName;
                }
                $user->update();

                $assignStudent = AssignStudent::where('id', $request->id)->where('student_id', $student_id)->first();
                $assignStudent->year_id = $request->year_id;
                $assignStudent->class_id = $request->class_id;
                $assignStudent->group_id = $request->group_id;
                $assignStudent->shift_id = $request->shift_id;
                $assignStudent->update();

                $discountStudent = DiscountStudent::where('assign_student_id', $request->id)->first();
                $discountStudent->discount = $request->discount;
                $discountStudent->update();
            });
            return redirect()->back()->with('success', 'Data updated successfully');
        } catch (Exception $e) {

            return redirect()->back()->with('fail', 'Data does not updated');
        }

    }

    public function student_promotion($student_id)
    {
        $data['editData'] = AssignStudent::with('student', 'discount')->where('student_id', $student_id)->first();
        $data['years'] = Year::orderBy('id', 'DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        return view('backend.students.student-promotion.student_promotion', $data);
    }

    public function promotion_store(Request $request,$student_id)
    {
        $request->validate([
            'name'              => 'required',
            'f_name'            => 'required',
            'm_name'            => 'required',
            'mobile'            => 'required',
            'present_address'   => 'required',
            'permanent_address' => 'required',
            'gender'            => 'required',
            'religion'          => 'required',
            'dob'               => 'required',
            'year_id'           => 'required',
            'class_id'          => 'required',
        ]);
        try {
            DB::transaction(function () use ($request, $student_id) {
                $user = User::find($student_id);
                $user->name = $request->name;
                $user->f_name = $request->f_name;
                $user->m_name = $request->m_name;
                $user->mobile = $request->mobile;
                $user->present_address = $request->present_address;
                $user->permanent_address = $request->permanent_address;
                $user->gender = $request->gender;
                $user->status = 1;
                $user->religion = $request->religion;
                $user->dob = date('Y-m-d', strtotime($request->dob));
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $fileName = date('YmdHi.') . $file->getClientOriginalExtension();
                    unlink(public_path('uploads/students_image/' . $user->image));
                    $file->move(public_path('uploads/students_image'), $fileName);
                    $user->image = $fileName;
                }
                $user->update();


                $assignStudent = new AssignStudent();
                $assignStudent->student_id = $student_id;
                $assignStudent->year_id = $request->year_id;
                $assignStudent->class_id = $request->class_id;
                $assignStudent->group_id = $request->group_id;
                $assignStudent->shift_id = $request->shift_id;
                $assignStudent->save();

                $discountStudent = new DiscountStudent();
                $discountStudent->assign_student_id = $assignStudent->id;
                $discountStudent->fee_category_id = 1;
                $discountStudent->discount = $request->discount;
                $discountStudent->save();
            });
            return redirect()->back()->with('success', 'Student promotion successfully');
        } catch (Exception $e) {

            return redirect()->back()->with('fail', 'Promotion failed');
        }
    }

    public function details($student_id)
    {
        $data['allData'] = AssignStudent::with('student', 'discount')->where('student_id', $student_id)->first();
        $pdf = PDF::loadView('backend.students.student-reg.registration_pdf', $data);
        return $pdf->stream();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $designation = Designation::find($id);
        $save = $designation->delete();
        if ($save) {
            return redirect()->back()->with('success', 'Data deleted successfully.');
        } else {
            return redirect()->back()->with('fail', 'Data is not deleted!');
        }
    }
}

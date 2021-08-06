@extends("backend.components.layout")

@section("title","Update student management")

@section("content")
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pr-3">Tables</div>
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Basic Tables</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto btn-group">
            <a href="{{route('student.registration.view')}}" class="btn btn-primary"><i class="lni lni-pencil"></i>
                Manage studnet</a>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            @if(Session::get('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif

            @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Update student registration</h3>
                </div>

                <div class="card-body">
                    <form action="{{route('student.registration.update',$editData->student_id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{@$editData->id}}">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="name">Student name : <font class="text-danger">*</font></label>
                                <input type="text" class="form-control form-control-sm" value="{{$editData['student']['name']}}" name="name" id="name">
                                <span class="text-danger">
                                @error('name')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="f_name">Father's name : <font class="text-danger">*</font></label>
                                <input type="text" class="form-control form-control-sm" value="{{$editData['student']['f_name']}}" name="f_name" id="f_name">
                                <span class="text-danger">
                                @error('f_name')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="m_name">Mother's name : <font class="text-danger">*</font></label>
                                <input type="text" class="form-control form-control-sm" value="{{$editData['student']['m_name']}}" name="m_name" id="m_name">
                                <span class="text-danger">
                                @error('m_name')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mobile">Mobile number : <font class="text-danger">*</font></label>
                                <input type="text" class="form-control form-control-sm" value="{{$editData['student']['mobile']}}" name="mobile" id="mobile">
                                <span class="text-danger">
                                @error('mobile')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="present_address">Present address : <font
                                        class="text-danger">*</font></label>
                                <input type="text" class="form-control form-control-sm" value="{{$editData['student']['present_address']}}" name="present_address"
                                       id="present_address">
                                <span class="text-danger">
                                @error('present_address')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="permanent_address">Permanent address : <font
                                        class="text-danger">*</font></label>
                                <input type="text" class="form-control form-control-sm" value="{{$editData['student']['permanent_address']}}" name="permanent_address"
                                       id="permanent_address">
                                <span class="text-danger">
                                @error('permanent_address')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Gender : <font class="text-danger">*</font></label>
                                <select name="gender" id="gender" class="form-control form-control-sm">
                                    <option value="">Select one</option>
                                    <option value="male" {{(@$editData['student']['gender'] == 'male') ? "selected":""}}>Male</option>
                                    <option value="female" {{(@$editData['student']['gender'] == 'female') ? "selected":""}}>Female</option>
                                </select>
                                <span class="text-danger">
                                @error('gender')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="religion">Religion : <font class="text-danger">*</font></label>
                                <select name="religion" id="religion" value="{{$editData['student']['religion']}}" class="form-control form-control-sm">
                                    <option value="">Select one</option>
                                    <option value="islam" {{(@$editData['student']['religion'] == 'islam') ? "selected":""}}>Islam</option>
                                    <option value="hindu" {{(@$editData['student']['religion'] == 'hindu') ? "selected":""}}>Hindu</option>
                                    <option value="other" {{(@$editData['student']['religion'] == 'other') ? "selected":""}}>Other</option>
                                </select>
                                <span class="text-danger">
                                @error('religion')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dob">Date of Birth : <font class="text-danger">*</font></label>
                                <input type="date" class="form-control form-control-sm" value="{{$editData['student']['dob']}}" name="dob" id="dob">
                                <span class="text-danger">
                                @error('dob')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="discount">Discount : </label>
                                <input type="text" class="form-control form-control-sm" value="{{$editData['discount']['discount']}}" name="discount" id="discount">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="year">Year : <font class="text-danger">*</font></label>
                                <select name="year_id" id="year" class="form-control form-control-sm">
                                    <option value="">Select one</option>
                                    @foreach($years as $year)
                                        <option value="{{$year->id}}" {{(@$editData->year_id==$year->id)?"selected":""}}>{{$year->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                @error('year_id')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="class_id">Class : <font class="text-danger">*</font></label>
                                <select name="class_id" id="class_id" class="form-control form-control-sm">
                                    <option value="">Select one</option>
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}" {{(@$editData->class_id==$class->id)?"selected":""}}>{{$class->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                @error('class_id')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="group_id">Group :</label>
                                <select name="group_id" id="group_id" class="form-control form-control-sm">
                                    <option value="">Select one</option>
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}" {{(@$editData->group_id==$group->id)?"selected":""}}>{{$group->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                @error('group_id')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="shift_id">Shift :</label>
                                <select name="shift_id" id="shift_id" class="form-control form-control-sm">
                                    <option value="">Select one</option>
                                    @foreach($shifts as $shift)
                                        <option value="{{$shift->id}}" {{(@$editData->shift_id==$shift->id)?"selected":""}}>{{$shift->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                @error('shift_id')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Image : <font class="text-danger">*</font></label>
                                <input type="file" name="image" id="image">
                                <span class="text-danger">
                                @error('image')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>

                            <div class="form-group col-md-2 pl-5">
                                <img id="showImage" src="{{asset('uploads/students_image/'.$editData['student']['image'])}}" alt="#" class="img-thumbnail w-50 h-100">
                            </div>
                        </div>
                        {{--=======================Button=====================--}}
                        <div class="text-right">
                            <button class="btn btn-light-info btn-lg">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('page-script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result)
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@stop

@endsection


@extends("backend.components.layout")

@section("title","Add student management")

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
                    <h3>Student registration</h3>
                </div>

                <div class="card-body">
                    <form action="{{route('student.registration.add')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="name">Student name : <font class="text-danger">*</font></label>
                                <input type="text" class="form-control form-control-sm" value="{{old('name')}}" name="name" id="name">
                                <span class="text-danger">
                                @error('name')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="f_name">Father's name : <font class="text-danger">*</font></label>
                                <input type="text" class="form-control form-control-sm" value="{{old('f_name')}}" name="f_name" id="f_name">
                                <span class="text-danger">
                                @error('f_name')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="m_name">Mother's name : <font class="text-danger">*</font></label>
                                <input type="text" class="form-control form-control-sm" value="{{old('m_name')}}" name="m_name" id="m_name">
                                <span class="text-danger">
                                @error('m_name')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mobile">Mobile number : <font class="text-danger">*</font></label>
                                <input type="text" class="form-control form-control-sm" value="{{old('mobile')}}" name="mobile" id="mobile">
                                <span class="text-danger">
                                @error('mobile')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="present_address">Present address : <font
                                        class="text-danger">*</font></label>
                                <input type="text" class="form-control form-control-sm" value="{{old('present_address')}}" name="present_address"
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
                                <input type="text" class="form-control form-control-sm" value="{{old('permanent_address')}}" name="permanent_address"
                                       id="permanent_address">
                                <span class="text-danger">
                                @error('permanent_address')
                                    {{$message}}
                                    @enderror
                            </span>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Gender : <font class="text-danger">*</font></label>
                                <select name="gender" id="gender" value="{{old('gender')}}" class="form-control form-control-sm">
                                    <option value="">Select one</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <span class="text-danger">
                                @error('gender')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                        <div class="form-group col-md-4">
                            <label for="religion">Religion : <font class="text-danger">*</font></label>
                            <select name="religion" id="religion" value="{{old('religion')}}" class="form-control form-control-sm">
                                <option value="">Select one</option>
                                <option value="islam">Islam</option>
                                <option value="hindu">Hindu</option>
                                <option value="other">Other</option>
                            </select>
                            <span class="text-danger">
                                @error('religion')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="dob">Date of Birth : <font class="text-danger">*</font></label>
                            <input type="date" class="form-control form-control-sm" value="{{old('dob')}}" name="dob" id="dob">
                            <span class="text-danger">
                                @error('dob')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="discount">Discount : </label>
                            <input type="text" class="form-control form-control-sm" value="{{old('discount')}}" name="discount" id="discount">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="year">Year : <font class="text-danger">*</font></label>
                            <select name="year_id" id="year" class="form-control form-control-sm">
                                <option value="">Select one</option>
                                @foreach($years as $year)
                                    <option value="{{$year->id}}">{{$year->name}}</option>
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
                                    <option value="{{$class->id}}">{{$class->name}}</option>
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
                                    <option value="{{$group->id}}">{{$group->name}}</option>
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
                                    <option value="{{$shift->id}}">{{$shift->name}}</option>
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
                            <img id="showImage" src="{{asset('theme/backend/assets/my_image/avater.png')}}" alt=""
                                 class="img-thumbnail" style="max-width: 50px">
                        </div>
                </div>
                {{--=======================Button=====================--}}
                <div class="text-right">
                    <button class="btn btn-light-info btn-lg">Submit</button>
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


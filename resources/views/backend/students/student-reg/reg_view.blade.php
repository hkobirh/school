@extends("backend.components.layout")

@section("title","Assign subject")

@section("content")
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pr-3">Tables</div>
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="#"><i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Basic Tables</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto btn-group">
            <a href="{{route('student.registration.create')}}" class="btn btn-primary"><i class="lni lni-circle-plus"></i> Add student</a>
        </div>
    </div>



    <div class="card">
        <div class="card-body">
            <form action="{{route('student.year.class.wise')}}" method="get">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="year">Year : <font class="text-danger">*</font></label>
                        <select name="year_id" id="year" class="form-control form-control-sm">
                            <option value="">Select one</option>
                            @foreach($years as $year)
                                <option value="{{$year->id}}" {{(@$year_id == $year->id)? "selected": "" }}>{{$year->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="class_id">Class : <font class="text-danger">*</font></label>
                        <select name="class_id" id="class_id" class="form-control form-control-sm">
                            <option value="">Select one</option>
                            @foreach($classes as $class)
                                <option value="{{$class->id}}" {{(@$class_id == $class->id)?"selected":""}}>{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4" style="padding-top: 29px">
                        <button type="submit" class="btn btn-primary btn-sm" name="search">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <!--end breadcrumb-->
        <div class="card-body">
            @if(!@$search)
            <div class="card-title">
                <h4 class="mb-0">Student List</h4>
            </div>
            <hr/>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Student name</th>
                        <th>ID NO</th>
                        <th>Roll</th>
                        <th>Class</th>
                        <th>Year</th>
                        @if(Auth::user()->role == 'admin')
                        <th>Code</th>
                        @endif
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $allData as $item => $value)
                        <tr class="{{$value->id}}">
                            <td>{{$item+1}}</td>
                            <td>{{$value['student']['name']}}</td>
                            <td>{{$value['student']['id_no']}}</td>
                            <td>{{$value->roll}}</td>
                            <td>{{$value['student_class']['name']}}</td>
                            <td>{{$value['year']['name']}}</td>
                            @if(Auth::user()->role == 'admin')
                                <th>{{$value['student']['code']}}</th>
                            @endif
                            <td>
                                <img src="{{(!empty($value['student']['image']))?url('uploads/students_image/'.$value['student']['image']): url('uploads/students_image/5.png')}}" alt="" style="width: 50px; height: 60px">
                            </td>
                            <td>
                                <a href="{{route('student.registration.edit',$value->student_id)}}" class="btn btn-info btn-sm"><i class=" bx bx-pencil"></i></a>
                                <a target="_blank" href="{{route('student.registration.details',$value->student_id)}}" class="btn btn-info btn-sm"><i class=" bx bx-show-alt"></i></a>
                                <a href="{{route('student.registration.promotion',$value->student_id)}}" class="btn btn-primary btn-sm"><i class="lni lni-forward"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <div class="card-title">
                    <h4 class="mb-0">Student List</h4>
                </div>
                <hr/>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Student name</th>
                            <th>ID NO</th>
                            <th>Roll</th>
                            <th>Class</th>
                            <th>Year</th>
                            {{--                        @if(Auth::user()->role == 'admin')
                                                    <th>Code</th>
                                                    @endif--}}
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $allData as $item => $value)
                            <tr class="{{$value->id}}">
                                <td>{{$item+1}}</td>
                                <td>{{$value['student']['name']}}</td>
                                <td>{{$value['student']['id_no']}}</td>
                                <td>{{$value->roll}}</td>
                                <td>{{$value['student_class']['name']}}</td>
                                <td>{{$value['year']['name']}}</td>
                                {{--                            @if(Auth::user()->role == 'admin')
                                                                <th>{{$value['student']['code']}}</th>
                                                            @endif--}}
                                <td>
                                    <img src="{{(!empty($value['student']['image']))?url('uploads/students_image/'.$value['student']['image']): url('uploads/students_image/5.png')}}" alt="" style="width: 50px; height: 60px">
                                </td>
                                <td>
                                    <a href="{{route('student.registration.edit',$value->student_id)}}" class="btn btn-info btn-sm"><i class=" bx bx-pencil"></i></a>
                                    <a href="{{route('student.registration.promotion',$value->student_id)}}" class="btn btn-primary btn-sm"><i class="lni lni-forward"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
        </div>
    </div>
@endsection

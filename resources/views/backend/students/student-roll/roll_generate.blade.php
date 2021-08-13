@extends("backend.components.layout")

@section("title","Student roll generate")

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
            <button type="submit" class="btn btn-primary"><i class="lni lni-search"></i></button>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <h3> Roll generate</h3>
            <form action="{{route('student.roll.add')}}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="year_id">Year : <font class="text-danger">*</font></label>
                        <select name="year_id" id="year_id" class="form-control form-control-sm">
                            <option value="">Select one</option>
                            @foreach($years as $year)
                                <option value="{{$year->id}}">{{$year->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="class_id">Class : <font class="text-danger">*</font></label>
                        <select name="class_id" id="class_id" class="form-control form-control-sm">
                            <option value="">Select one</option>
                            @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4" style="padding-top: 29px">
                        <a id="search" class="btn btn-primary btn-sm" name="search"> <i class="lni lni-search"></i>
                            Get student</a>
                    </div>
                </div>
                <div class="row d-none" id="roll-generate">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th scope="col">Student ID</th>
                                <th scope="col">Student name</th>
                                <th scope="col">Father's name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Roll</th>
                            </tr>
                            </thead>
                            <tbody id="roll-generate-tr">
                            </tbody>
                        </table>
                    </div>

                    <div class="w-100">
                        <button type="submit" class="btn btn-light-primary w-100">Roll generate</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).on('click', '#search', function () {
            let year_id = $('#year_id').val();
            let class_id = $('#class_id').val();
            $.ajax({
                url: "{{route('student.roll.get-student')}}",
                type: "GET",
                data: {'year_id': year_id, 'class_id': class_id,},
                success: function (data) {
                    $('#roll-generate').removeClass('d-none');
                    let html = '';
                    $.each(data, function (key, v) {
                        html +=
                            '<tr>' +
                            '<td>' + v.student.id_no + '<input type="hidden" name="student_id[]" value="' + v.student_id + '"></td>' +
                            '<td>' + v.student.name + '</td>' +
                            '<td>' + v.student.f_name + '</td>' +
                            '<td>' + v.student.gender + '</td>' +
                            '<td> <input type="text" name="roll[]" required value="' + v.roll + '"></td>' +
                            '</tr>';
                    });
                    html = $('#roll-generate-tr').html(html);
                }
            })
        })
    </script>
@endsection

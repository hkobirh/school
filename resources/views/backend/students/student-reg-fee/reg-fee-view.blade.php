@extends("backend.components.layout")

@section("title","Manage students registration fee")

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
                        <a id="search" class="btn btn-primary btn-sm"> <i class="lni lni-search"></i>
                            Search</a>
                    </div>
                </div>
            </form>

            <div class="card-body">
                <div id="DocumentResult">Test test test Test test test</div>
                    <script id="document-template" type="text/x-handlebars-template">
                        <table class="table-sm table-bordered table-striped" style="width: 100%;">
                            <thead>
                            <tr>
                                @{{{thsource}}}
                            </tr>
                            </thead>
                            <tbody>
                            @{{ #each this }}
                            <tr>
                                @{{{tdsource}}}
                            </tr>
                            @{{/each }}
                            </tbody>
                        </table>
                    </script>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).on('click', '#search', function () {
            let year_id = $('#year_id').val();
            let class_id = $('#class_id').val();
            $.ajax({
                url: "{{route('student.reg.get-student')}}",
                type: "GET",
                data: {'year_id': year_id, 'class_id': class_id},
                success: function (data) {
                    let source = $("#document-template").html();
                    let template = Handlebars.compile(source);
                    let html = template(data);

                    //console.log(html);
                    $("#DocumentResult").html(data.thsource)

                    /*$('#DocumentResult').html(html);
                    $('[data-toggle="tooltip"]').tooltip();*/
                }
            });
        });
    </script>
@endsection

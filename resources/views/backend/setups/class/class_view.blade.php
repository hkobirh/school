@extends("backend.components.layout")

@section("title","Class setup")

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
            <a href="{{route('setup.student.class.create')}}" class="btn btn-primary"><i class="lni lni-circle-plus"></i> Add class</a>
        </div>
    </div>



    <div class="card">
        <!--end breadcrumb-->
        <div class="card-body">
            <div class="card-title">
                <h4 class="mb-0">Student Class List</h4>
            </div>

            <hr/>
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
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Class Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <a href="{{route('setup.student.class.edit',$item->id)}}" class="btn btn-info btn-sm"><i class=" bx bx-pencil"></i>Edit</a>
                                <a href="{{route('setup.student.class.delete',$item->id)}}" class="btn btn-warning btn-sm"><i class=" bx bx-trash-alt"></i>Delete</a>
                            </td>
                        </tr>
                  @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

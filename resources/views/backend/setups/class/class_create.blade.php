@extends("backend.components.layout")

@section("title")
    Create class
@endsection

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
            <a href="{{route('setup.student.class.view')}}" class="btn btn-primary"><i class="lni lni-pencil"></i>
                Manage class</a>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
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
                    <h3>Create class</h3>
                </div>
                <div class="card-body">
                    <div class="ml-auto">
                        <form action="{{route('setup.student.class.add')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name"></label>
                                <input class="result form-control" type="text" id="name" name="name" value="{{old('name')}}" placeholder="Enter class name">
                                <span class="text-danger">@error('name'){{$message}}@enderror</span>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary"><i class="lni lni-circle-plus"></i> Add
                                    class
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection

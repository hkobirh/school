@extends("backend.components.layout")

@section("title","Student fee category")

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
            <a href="{{route('setup.fee.category.view')}}" class="btn btn-primary"><i class="lni lni-pencil"></i>
                Manage student fee category</a>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6 offset-md-3">
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
                    <h3>Update student fee category</h3>
                </div>
                <div class="card-body">
                    <div class="ml-auto">
                        <form action="{{route('setup.fee.category.update',$studentFee->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name"></label>
                                <input class="result form-control" type="text" id="name" name="name"
                                       value="{{$studentFee->name}}">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary"><i class=" bx bx-pencil"></i> Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

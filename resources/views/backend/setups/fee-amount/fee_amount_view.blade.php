@extends("backend.components.layout")

@section("title","Student fee amount setup")

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
            <a href="{{route('setup.fee.amount.create')}}" class="btn btn-primary"><i class="lni lni-circle-plus"></i> Add fee amount</a>
        </div>
    </div>



    <div class="card">
        <!--end breadcrumb-->
        <div class="card-body">
            <div class="card-title">
                <h4 class="mb-0">Fee Amount Category List</h4>
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
                        <th>Fee catagory</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $feeAmount as $item => $value)
                        <tr class="{{$value->id}}">
                            <td>{{$item+1}}</td>
                            <td>{{$value['fee_categoryis']['name']}}</td>
                            <td>
                                <a href="{{route('setup.fee.amount.details',$value->fee_category_id)}}" class="btn btn-primary btn-sm"><i class=" bx bx-show-alt"></i></a>
                                <a href="{{route('setup.fee.amount.edit',$value->fee_category_id)}}" class="btn btn-info btn-sm"><i class=" bx bx-pencil"></i></a>
                            </td>
                        </tr>
                  @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

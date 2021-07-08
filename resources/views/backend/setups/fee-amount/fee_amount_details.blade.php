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
            <a href="{{route('setup.fee.amount.view')}}" class="btn btn-primary"><i class="lni lni-circle-plus"></i> Fee amount list</a>
        </div>
    </div>



    <div class="card">
        <!--end breadcrumb-->
        <div class="card-body">
            <div class="card-title">
                <h4 class="mb-0">Student fee amount details</h4>
            </div>
            <hr/>
            <h4 class="text-warning"><strong class="text-info">Fee type : </strong> {{$amountDetails['0']['fee_categoryis']['name']}}</h4>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Class</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $amountDetails as $key => $value)
                        <tr class="{{$value->id}}">
                            <td>{{$key+1}}</td>
                            <td>{{$value['class_name']['name']}}</td>
                            <td>
                            {{$value->amount}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

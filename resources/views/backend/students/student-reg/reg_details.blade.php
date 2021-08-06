@extends("backend.components.layout")

@section("title","Assign subject details")

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
            <a href="{{route('setup.subject.assign.view')}}" class="btn btn-primary"><i class="lni lni-circle-plus"></i> Manage assign subject</a>
        </div>
    </div>



    <div class="card">
        <!--end breadcrumb-->
        <div class="card-body">
            <div class="card-title">
                <h4 class="mb-0">Assigned subject details</h4>
            </div>
            <hr/>
            <h4 class="text-warning"><strong class="text-info">Class : </strong> {{$editData['0']['student_class']['name']}}</h4>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Subject</th>
                        <th>Full mark</th>
                        <th>Pass mark</th>
                        <th>Subjective mark</th>
                        <th>Objective mark</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $editData as $item => $value)
                        <tr class="{{$value->id}}">
                            <td>{{$item+1}}</td>
                            <td>{{$value['subject']['name']}}</td>
                            <td>{{$value->full_mark}}</td>
                            <td>{{$value->pass_mark}}</td>
                            <td>{{$value->subjective_mark}}</td>
                            <td>#######</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@extends("backend.components.layout")

@section("title","Student fee amount add")

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
            <a href="{{route('setup.fee.amount.view')}}" class="btn btn-primary"><i class="lni lni-pencil"></i>
                Manage fee amount</a>
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
                    <h3>Add fee amount</h3>
                </div>
                <div class="card-body">
                    <div class="ml-auto">
                        <form action="{{route('setup.fee.amount.add')}}" method="post" enctype="multipart/form-data" id="myForm">
                            @csrf
                            <div class="add-item">
                                <div class="form-row">
                                    <div class="col-md-5 form-group">
                                        <label for="fee-category">Select Fee Category :</label>
                                        <select name="fee_category_id" id="fee-category"
                                                class="result form-control">
                                            <option value="">Select fee category</option>
                                            @foreach($feeCategories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{--First input fields--}}
                                <div class="form-row">
                                    <div class="col-md-5 form-group">
                                        <label for="fee-category">Select Class :</label>
                                        <select name="class_id[]" id="class"
                                                class="result form-control">
                                            <option value="">Select class</option>
                                            @foreach($className as $cls)
                                                <option value="{{$cls->id}}">{{$cls->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label for="amount">Amount :</label>
                                        <input class="result form-control" type="text" id="name" name="amount[]"
                                               value="{{old('amount')}}" placeholder="Enter fee amount">
                                        <span class="text-danger">@error('amount'){{$message}}@enderror</span>
                                    </div>
                                    <div class="col-md-1 form-group" style="margin-top: 30px">
                                        <span class="btn btn-light-info addMoreBtn"><i class="bx bx-plus"></i></span>
                                    </div>
                                </div>
                                {{--=================================Extend input fields=====================================--}}
                                <div>
                                    <div class="whole_extra_item_add" id="whole_extra_item_add">
                                        <div class="delete_extra_item_add" id="delete_extra_item_add">
                                            <div class="form-row">
                                                <div class="col-md-5 form-group">
                                                    <label for="class">Select class :</label>
                                                    <select name="class_id[]" id="class" class="result form-control">
                                                        <option value="">Select class</option>
                                                        @foreach($className as $cls)
                                                            <option value="{{$cls->id}}">{{$cls->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-5 form-group">
                                                    <label for="amount">Amount :</label>
                                                    <input class="result form-control" type="text" id="amount" name="amount[]">
                                                    <span
                                                        class="text-danger">@error('amount'){{$message}}@enderror</span>
                                                </div>

                                                <div class="col-md-1 form-group" style="margin-top: 30px;min-width: 100px;">
                                                    <div class="form-row">
                                                        <button class="btn btn-light-info addMoreBtn"><i
                                                                class="bx bx-plus"></i></button>
                                                        <button class="btn btn-light-danger removeMoreBtn"><i
                                                                class="bx bx-minus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="lni lni-circle-plus"></i> Add fee
                                amount
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('page-script')
    <script type="text/javascript">
        $(document).ready(function () {
            var counter = 0;
            $(document).on("click", ".addMoreBtn", function (e) {
                e.preventDefault();
                var theItem = $("#whole_extra_item_add").html();
                $(this).closest(".add-item").append(theItem);
                counter++;
            });

            $(document).on("click", ".removeMoreBtn", function (e) {
                e.preventDefault();
                $(this).closest(".delete_extra_item_add").remove();
                counter -= 1;
            });
        });
/*        $('#myForm').validate({
            roles:{

                "fee_category_id":{
                    required: true
                },
                "class_id[]":{
                    required: true
                },
                "name[]":{
                    required: true
                },
            },
            message:{

            }
        })*/
    </script>
@stop
@endsection


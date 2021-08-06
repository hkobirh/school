@extends("backend.components.layout")

@section("title","Assign subject")

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
            <a href="{{route('setup.subject.assign.view')}}" class="btn btn-primary"><i class="lni lni-pencil"></i>
                Manage assign subject</a>
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
                    <h3>Assign subject</h3>
                </div>
                <div class="card-body">
                    <div class="ml-auto">
                        <form action="{{route('setup.subject.assign.add')}}" method="post" enctype="multipart/form-data"
                              id="myForm">
                            @csrf
                            <div class="add-item">
                                <div class="form-row">
                                    <div class="col-md-5 form-group">
                                        <label for="fee-category">Select class :</label>
                                        <select name="class_id" id="class_id"
                                                class="result form-control">
                                            <option value="">Select class</option>
                                            @foreach($classes as $class)
                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{--First input fields--}}
                                <div class="form-row">
                                    <div class="col-md-3 form-group">
                                        <label for="fee-category">Select subject :</label>
                                        <select name="subject_id[]" id="class"
                                                class="result form-control">
                                            <option value="">Select a subject</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label for="fmark">Full mark :</label>
                                        <input class="result form-control" type="text" id="fmark" name="full_mark[]"
                                               value="{{old('full_mark')}}" placeholder="Full mark">
                                        <span class="text-danger">@error('full_mark'){{$message}}@enderror</span>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label for="pmark">Pass mark :</label>
                                        <input class="result form-control" type="text" id="pmark" name="pass_mark[]"
                                               value="{{old('pass_mark')}}" placeholder="Pass mark">
                                        <span class="text-danger">@error('full_mark'){{$message}}@enderror</span>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label for="gmark">Subjective mark :</label>
                                        <input class="result form-control" type="text" id="gmark"
                                               name="subjective_mark[]"
                                               value="{{old('subjective_mark')}}" placeholder="Subjective mark">
                                        <span class="text-danger">@error('subjective_mark'){{$message}}@enderror</span>
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
                                                <div class="col-md-3 form-group">
                                                    <label for="fee-category">Select subject :</label>
                                                    <select name="subject_id[]" id="class"
                                                            class="result form-control">
                                                        <option value="">Select a subject</option>
                                                        @foreach($subjects as $subject)
                                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <label for="fmark">Full mark :</label>
                                                    <input class="result form-control" type="text" id="fmark"
                                                           name="full_mark[]"
                                                           value="{{old('full_mark')}}" placeholder="Full mark">
                                                    <span
                                                        class="text-danger">@error('full_mark'){{$message}}@enderror</span>
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <label for="pmark">Pass mark :</label>
                                                    <input class="result form-control" type="text" id="pmark"
                                                           name="pass_mark[]"
                                                           value="{{old('pass_mark')}}" placeholder="Pass mark">
                                                    <span
                                                        class="text-danger">@error('full_mark'){{$message}}@enderror</span>
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <label for="gmark">Subjective mark :</label>
                                                    <input class="result form-control" type="text" id="gmark"
                                                           name="subjective_mark[]"
                                                           value="{{old('subjective_mark')}}"
                                                           placeholder="Subjective mark">
                                                    <span
                                                        class="text-danger">@error('subjective_mark'){{$message}}@enderror</span>
                                                </div>

                                                <div class="col-md-1 form-group"
                                                     style="margin-top: 30px;min-width: 100px;">
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
                            <button type="submit" class="btn btn-primary"><i class="lni lni-circle-plus"></i> Assign
                                Subject
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--==========================================================================================--}}


{{--

    <div class="container">
        <table class="_table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th width="50px">
                    <div class="action_container">
                        <button class="success" onclick="create_tr('table_body')">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </th>
            </tr>
            </thead>
            <tbody id="table_body">
            <tr>
                <td>
                    <input type="text" class="form_control" placeholder="Jhon Dhoe">
                </td>
                <td>
                    <input type="text" class="form_control" placeholder="+880177x-xxxxxx">
                </td>
                <td>
                    <textarea class="form_control" placeholder="Enter Your Address..."></textarea>
                </td>
                <td>
                    <div class="action_container">
                        <button class="danger" onclick="remove_tr(this)">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <script>
        function create_tr(table_id) {
            let table_body = document.getElementById(table_id),
                first_tr = table_body.firstElementChild
            tr_clone = first_tr.cloneNode(true);

            table_body.append(tr_clone);

            clean_first_tr(table_body.firstElementChild);
        }

        function clean_first_tr(firstTr) {
            let children = firstTr.children;

            children = Array.isArray(children) ? children : Object.values(children);
            children.forEach(x => {
                if (x !== firstTr.lastElementChild) {
                    x.firstElementChild.value = '';
                }
            });
        }


        function remove_tr(This) {
            if (This.closest('tbody').childElementCount == 1) {
                alert("You Don't have Permission to Delete This ?");
            } else {
                This.closest('tr').remove();
            }
        }
    </script>






--}}


    {{--==================================================================================================--}}
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


@extends('layouts.master')
@section('css')
    @toastr_css


@section('title')
    Classrooms
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    ClassRooms
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    Add Classroom
                </button>
                <button type="button" class="button x-small" id="btn_delete_all">Delete Checkboxes selected</button>
                <br><br>
                <form action="{{ route('filter_classes') }}" method="POST">
                    @csrf
                    <select class="selectpicker" data-style="btn-info" name="grade_id" required
                        onchange="this.form.submit()">
                        <option value="" selected disabled>Search By Grade</option>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                        @endforeach
                    </select>
                </form>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox"
                                        onclick="CheckAll('box1', this)" /></th>
                                <th>#</th>
                                <th>Classroom Name</th>
                                <th>Grade Name</th>
                                <th>Processes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($details))
                                <?php $classListes = $details; ?>
                            @else
                                <?php $classListes = $classrooms; ?>
                            @endif
                            @foreach ($classListes as $classroom)
                                <tr>
                                    <td><input type="checkbox" value="{{ $classroom->id }}" class="box1"></td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $classroom->name_class }}</td>
                                    <td>
                                        {{ $classroom->grade->name }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $classroom->id }}" title="Edit"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $classroom->id }}" title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $classroom->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Edit_Classroom
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{ route('Classrooms.update', $classroom->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="put">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">Classroom Name
                                                                :</label>
                                                            <input id="Name" type="text" name="name_class"
                                                                class="form-control"
                                                                value="{{ $classroom->name_class }}" required>
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Grade Name
                                                            :</label>
                                                        <select class="form-control form-control-lg"
                                                            id="exampleFormControlSelect1" name="grade_id">
                                                            <option
                                                                value="{{ $classroom->grade ? $classroom->grade->id : '' }}">
                                                                {{ $classroom->grade ? $classroom->grade->name : 'N/A' }}
                                                            </option>

                                                            @foreach ($grades as $grade)
                                                                <option value="{{ $grade->id }}">
                                                                    {{ $grade->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <br><br>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Delete Classroom
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('Classrooms.destroy', $classroom->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- add_modal_class -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        Add_Classroom
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class=" row mb-30" action="{{ route('Classrooms.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Classes">
                                    <div data-repeater-item>
                                        <div class="row">
                                            <div class="col">
                                                <label for="Name" class="mr-sm-2">Classroom Name
                                                    :</label>
                                                <input class="form-control" type="text" name="name_class" />
                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">Grade Name
                                                    :</label>

                                                <div class="box">
                                                    <select class="fancyselect" name="grade_id">
                                                        @foreach ($grades as $grade)
                                                            <option value="{{ $grade->id }}">{{ $grade->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">Processes
                                                    :</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete
                                                    type="button" value="Delete Row" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button" value="Add Row" />
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>

    </div>


    {{-- delete_all_checkboxes --}}
    <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        Delete classrooms
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('delete_all') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input class="text" type="hidden" id="delete_all_id" name="delete_all_id"
                            value=''>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render

<script>
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;

        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }
</script>


<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });
</script>




@endsection

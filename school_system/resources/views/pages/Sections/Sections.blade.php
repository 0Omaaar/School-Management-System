@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Sections
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Sections
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <button class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    Add Section</button>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">
                        @foreach ($grades as $grade)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{ $grade->name }}</a>
                                <div class="acd-des">
                                    <div class="row">
                                        <div class="col-xl-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="d-block d-md-flex justify-content-between">
                                                        <div class="d-block">
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0">
                                                            <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>Section Name
                                                                    </th>
                                                                    <th>Classroom Name</th>
                                                                    <th>Status</th>
                                                                    <th>Processes</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($grade->sections as $list_Sections)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $list_Sections->name_section }}</td>
                                                                        <td>{{ $list_Sections->classroom->name_class }}
                                                                        </td>
                                                                        <td>
                                                                            @if ($list_Sections->status === 1)
                                                                                <label
                                                                                    class="badge badge-success">Status_Section_AC</label>
                                                                            @else
                                                                                <label
                                                                                    class="badge badge-danger">Status_Section_No</label>
                                                                            @endif

                                                                        </td>
                                                                        <td>

                                                                            <a href="#"
                                                                                class="btn btn-outline-info btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#edit{{ $list_Sections->id }}">Edit</a>
                                                                            <a href="#"
                                                                                class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#delete{{ $list_Sections->id }}">Delete</a>
                                                                        </td>
                                                                    </tr>


                                                                    {{-- Edit section --}}
                                                                    <div class="modal fade"
                                                                        id="edit{{ $list_Sections->id }}" tabindex="-1"
                                                                        role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        style="font-family: 'Cairo', sans-serif;"
                                                                                        id="exampleModalLabel">
                                                                                        Edit Section
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form
                                                                                        action="{{ route('Sections.update', $list_Sections->id) }}"
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        <input type="hidden"
                                                                                            name="_method"
                                                                                            value="put">
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                    name="name_section"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_Sections->name_section }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">Name
                                                                                                Grade</label>
                                                                                            <select name="grade_id"
                                                                                                class="custom-select"
                                                                                                onclick="console.log($(this).val())">
                                                                                                <option
                                                                                                    value="{{ $grade->id }}">
                                                                                                    {{ $grade->name }}
                                                                                                </option>
                                                                                                @foreach ($list_grades as $list_Grade)
                                                                                                    <option
                                                                                                        value="{{ $list_Grade->id }}">
                                                                                                        {{ $list_Grade->name }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">Name
                                                                                                Class</label>
                                                                                            <select name="classroom_id"
                                                                                                class="custom-select">
                                                                                                <option
                                                                                                    value="{{ $list_Sections->classroom->id }}">
                                                                                                    {{ $list_Sections->classroom->name_class }}
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="col">
                                                                                            <div class="form-check">
                                                                                                @if ($list_Sections->status === 1)
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        checked
                                                                                                        class="form-check-input"
                                                                                                        name="status"
                                                                                                        id="exampleCheck1">
                                                                                                @else
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        class="form-check-input"
                                                                                                        name="status"
                                                                                                        id="exampleCheck1">
                                                                                                @endif
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="exampleCheck1">Status</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">Name Teacher</label>
                                                                                            <select multiple
                                                                                                name="teacher_id[]"
                                                                                                class="form-control"
                                                                                                id="exampleFormControlSelect2">
                                                                                                @foreach ($list_Sections->teachers as $teacher)
                                                                                                    <option selected
                                                                                                        value="{{ $teacher['id'] }}">
                                                                                                        {{ $teacher['name'] }}
                                                                                                    </option>
                                                                                                @endforeach

                                                                                                @foreach ($teachers as $teacher)
                                                                                                    <option
                                                                                                        value="{{ $teacher->id }}">
                                                                                                        {{ $teacher->name }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">Close</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger">Submit</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- delete_modal_Grade -->
                                                                    <div class="modal fade"
                                                                        id="delete{{ $list_Sections->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                        class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        Delete section
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form
                                                                                        action="{{ route('Sections.destroy', $list_Sections->id) }}"
                                                                                        method="post">
                                                                                        @csrf
                                                                                        <input type="hidden"
                                                                                            name="_method"
                                                                                            value="delete">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-dismiss="modal">Close</button>
                                                                                            <button type="submit"
                                                                                                class="btn btn-danger">Submit</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Add Section --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                Add section</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('Sections.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="name_section" class="form-control"
                                            placeholder="Section Name">
                                    </div>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="inputName" class="control-label">Grade Name</label>
                                    <select name="grade_id" class="custom-select"
                                        onchange="console.log($(this).val())">
                                        <option value="" selected disabled>
                                            Select Grade
                                        </option>
                                        @foreach ($list_grades as $list_Grade)
                                            <option value="{{ $list_Grade->id }}"> {{ $list_Grade->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="inputName" class="control-label">Class Name</label>
                                    <select name="classroom_id" class="custom-select">
                                    </select>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="inputName" class="control-label">Teacher</label>
                                    <select name="teacher_id[]" class="custom-select" multiple>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}"> {{ $teacher->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
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
    </div>
</div>
</div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
<script>
    $(document).ready(function() {
        $('select[name="grade_id"]').on('change', function() {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="classroom_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="classroom_id"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>

@endsection

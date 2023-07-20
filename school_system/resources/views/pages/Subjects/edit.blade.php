@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Edit Subject
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Edit Subject
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('subjects.update', 'update') }}" method="post" autocomplete="off">
                            {{ method_field('patch') }}
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">Name</label>
                                    <input type="text" name="name" value="{{ $subject->name }}"
                                        class="form-control">
                                    <input type="hidden" name="id" value="{{ $subject->id }}">
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputState">Grade</label>
                                    <select class="custom-select my-1 mr-sm-2" name="grade_id">
                                        <option selected disabled>Choose...</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}"
                                                {{ $grade->id == $subject->grade_id ? 'selected' : '' }}>
                                                {{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">Classroom</label>
                                    <select name="class_id" class="custom-select">
                                        <option value="{{ $subject->classroom->id }}">
                                            {{ $subject->classroom->name_class }}
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">Teacher</label>
                                    <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                        <option selected disabled>Choose...</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}"
                                                {{ $teacher->id == $subject->teacher_id ? 'selected' : '' }}>
                                                {{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Submit
                            </button>
                        </form>
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
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="class_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="class_id"]').append('<option value="' +
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
@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    list_students
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    list_students
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                Retreat All
                            </button>
                            <br><br>


                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">Name</th>
                                            <th class="alert-danger">Old Grade</th>
                                            <th class="alert-danger">Academic Year</th>
                                            <th class="alert-danger">Old Classroom</th>
                                            <th class="alert-danger">Old Section</th>
                                            <th class="alert-success">Actual Grade</th>
                                            <th class="alert-success">Actual Academic Year</th>
                                            <th class="alert-success">Actual Classroom</th>
                                            <th class="alert-success">Actual Section</th>
                                            <th>Processes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $promotion->student->name }}</td>
                                                <td>{{ $promotion->f_grade->name }}</td>
                                                <td>{{ $promotion->academic_year }}</td>
                                                <td>{{ $promotion->f_classroom->name_class }}</td>
                                                <td>{{ $promotion->f_section->name_section }}</td>
                                                <td>{{ $promotion->t_grade->name }}</td>
                                                <td>{{ $promotion->academic_year_new }}</td>
                                                <td>{{ $promotion->t_classroom->name_class }}</td>
                                                <td>{{ $promotion->t_section->name_section }}</td>
                                                <td>

                                                    <button type="button" class="btn btn-outline-danger mt-2"
                                                        data-toggle="modal"
                                                        data-target="#Delete_one{{ $promotion->id }}">Retreat Student</button>
                                                    <button type="button" class="btn btn-outline-success mt-2"
                                                        data-toggle="modal" data-target="#">Graduate Student</button>
                                                </td>
                                            </tr>
                                            {{-- @include('pages.Students.promotion.Delete_all') --}}
                                            {{-- @include('pages.Students.promotion.Delete_one') --}}
                                        @endforeach
                                </table>
                            </div>
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
@endsection

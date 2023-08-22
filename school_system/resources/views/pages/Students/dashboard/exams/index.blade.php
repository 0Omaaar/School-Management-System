@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    Exam's List
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Exam's List
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
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject</th>
                                            <th>Quizz's Name</th>
                                            <th>Start / Score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quizzes as $quizze)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $quizze->subject->name }}</td>
                                                <td>{{ $quizze->name }}</td>
                                                <td>
                                                    <a href="{{ route('student_exams.show', $quizze->id) }}"
                                                        class="btn btn-outline-success btn-sm" role="button"
                                                        aria-pressed="true" onclick="alertAbuse()">
                                                        <i class="fas fa-person-booth"></i></a>
                                                </td>
                                            </tr>
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
{{-- @toastr_js --}}
{{-- @toastr_render --}}
@endsection

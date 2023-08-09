@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    Students Attendance
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Students Attendance
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div class="alert alert-danger">
        <ul>
            <li>{{ session('status') }}</li>
        </ul>
    </div>
@endif

<h5 style="font-family: 'Cairo', sans-serif;color: red">Today : {{ date('Y-m-d') }}</h5>
<form method="post" action="" autocomplete="off">

    @csrf
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center">
        <thead>
            <tr>
                <th class="alert-success">#</th>
                <th class="alert-success">Name</th>
                <th class="alert-success">Email</th>
                <th class="alert-success">Gender</th>
                <th class="alert-success">Grade</th>
                <th class="alert-success">Classroom</th>
                <th class="alert-success">Section</th>
                <th class="alert-success">Attendance</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->gender->name }}</td>
                    <td>{{ $student->grade->name }}</td>
                    <td>{{ $student->classroom->name_class }}</td>
                    <td>{{ $student->section->name_section }}</td>
                    <td>
                        <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                            <input name="attendences[{{ $student->id }}]"
                                @foreach ($student->attendance()->where('attendence_date', date('Y-m-d'))->get() as $attendance)
                                   {{ $attendance->attendence_status == 1 ? 'checked' : '' }} @endforeach
                                class="leading-tight" type="radio" value="presence">
                            <span class="text-success">Present</span>
                        </label>

                        <label class="ml-4 block text-gray-500 font-semibold">
                            <input name="attendences[{{ $student->id }}]"
                                @foreach ($student->attendance()->where('attendence_date', date('Y-m-d'))->get() as $attendance)
                                   {{ $attendance->attendence_status == 0 ? 'checked' : '' }} @endforeach
                                class="leading-tight" type="radio" value="absent">
                            <span class="text-danger">Absent</span>
                        </label>

                        <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                        <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                        <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <P>
        <button class="btn btn-success" type="submit">Submit</button>
    </P>
</form><br>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection

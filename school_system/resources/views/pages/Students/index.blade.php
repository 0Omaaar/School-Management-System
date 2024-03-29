@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    List_students
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    List Students
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
                            <a href="{{ route('Students.create') }}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">Add Student</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Grade</th>
                                            <th>Classrooms</th>
                                            <th>Section</th>
                                            <th>Processes</th>
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
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#"
                                                            role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Operations
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" style="font-size: 10px;"
                                                                href="{{ route('Students.show', $student->id) }}"><i
                                                                    style="color: #ffc107"
                                                                    class="fa fa-eye "></i>&nbsp;Show Student Infos</a>
                                                            <a class="dropdown-item" style="font-size: 10px;"
                                                                href="{{ route('Students.edit', $student->id) }}"><i
                                                                    style="color:green"
                                                                    class="fa fa-edit"></i>&nbsp;Edit Student Infos</a>
                                                            <a class="dropdown-item" style="font-size: 10px;"
                                                                href="{{ route('Fees_Invoices.show', $student->id) }}"><i
                                                                    style="color: #0000cc"
                                                                    class="fa fa-edit"></i>&nbsp;&nbsp;Add Fees
                                                                Invoices</a>
                                                            <a class="dropdown-item" style="font-size: 10px;"
                                                                href="{{ route('receipt_students.show', $student->id) }}"><i
                                                                    style="color: #9dc8e2"
                                                                    class="fa fa-money"></i>&nbsp; &nbsp;Catch
                                                                Receipt</a>
                                                            <a class="dropdown-item" style="font-size: 10px;"
                                                                href="{{ route('Students.soft', $student->id) }}"><i
                                                                    style="color: #0000cc"
                                                                    class="fa fa-graduation-cap"></i>&nbsp;&nbsp;Graduate
                                                                Student</a>
                                                            <a class="dropdown-item" style="font-size: 10px;"
                                                                href="{{ route('ProcessingFee.show', $student->id) }}"><i
                                                                    style="color: red"
                                                                    class="fa fa-money"></i>&nbsp;&nbsp;Exclude Fee</a>
                                                            <a class="dropdown-item" style="font-size: 10px;"
                                                                href="{{ route('Payment_students.show', $student->id) }}"><i
                                                                    style="color: green;"
                                                                    class="fa fa-credit-card"></i>&nbsp;&nbsp;Payment
                                                                Back</a>
                                                            <a class="dropdown-item" style="font-size: 10px;"
                                                                data-target="#Delete_Student{{ $student->id }}"
                                                                data-toggle="modal"
                                                                href="##Delete_Student{{ $student->id }}"><i
                                                                    style="color: red"
                                                                    class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;Delete
                                                                Student</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('pages.Students.delete')
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

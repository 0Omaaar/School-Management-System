@extends('layouts.master')
@section('css')

@section('title')
    Attendance Repports
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Attendance Repports
@stop
<!-- breadcrumb -->

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
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

                    <form method="post" action="{{route('sons.attendances.search')}}" autocomplete="off">
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">Search Infos</h6><br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="student">Students</label>
                                    <select class="custom-select mr-sm-2" name="student_id">
                                        <option value="0">All</option>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="card-body datepicker-form">
                                <div class="input-group" data-date-format="yyyy-mm-dd">
                                    <input type="date" class="form-control "
                                        placeholder="From" required name="from">
                                    <span class="input-group-addon">To</span>
                                    <input  placeholder="To" type="date" class="form-control"
                                        required name="to">
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                            type="submit">Submit</button>
                    </form>
                    @isset($Students)
                        <div class="table-responsive">
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                style="text-align: center">
                                <thead>
                                    <tr>
                                        <th class="alert-success">#</th>
                                        <th class="alert-success">Name</th>
                                        <th class="alert-success">Grade</th>
                                        <th class="alert-success">Section</th>
                                        <th class="alert-success">Date</th>
                                        <th class="alert-warning">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Students as $x)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $x->students->name }}</td>
                                            <td>{{ $x->grade->name }}</td>
                                            <td>{{ $x->section->name_section }}</td>
                                            <td>{{ $x->attendence_date }}</td>
                                            <td>

                                                @if ($x->attendence_status == 0)
                                                    <span class="btn-danger p-1" style="border-radius: 10px">Absent</span>
                                                @else
                                                    <span class="btn-success p-1" style="border-radius: 10px">Present</span>
                                                @endif
                                            </td>
                                        </tr>
                                        {{-- @include('pages.Students.Delete') --}}
                                    @endforeach
                            </table>
                        </div>
                    @endisset

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection

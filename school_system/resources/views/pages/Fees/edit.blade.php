@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Edit Scolar Fees
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Edit Scolar Fees
@stop
<!-- breadcrumb -->
@endsection
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

                <form action="{{ route('Fees.update', $fee->id) }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="form-row">


                        <div class="form-group col">
                            <label for="inputEmail4">Name</label>
                            <input type="text" value="{{ $fee->title }}" name="title" class="form-control">
                        </div>


                        <div class="form-group col">
                            <label for="inputEmail4">Amount</label>
                            <input type="number" value="{{ $fee->amount }}" name="amount" class="form-control">
                        </div>

                    </div>


                    <div class="form-row">

                        <div class="form-group col">
                            <label for="inputState">Grade</label>
                            <select class="custom-select mr-sm-2" name="grade_id">
                                @foreach ($Grades as $Grade)
                                    <option value="{{ $Grade->id }}"
                                        {{ $Grade->id == $fee->grade_id ? 'selected' : '' }}>{{ $Grade->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="inputZip">Classroom</label>
                            <select class="custom-select mr-sm-2" name="classroom_id">
                                <option value="{{ $fee->classroom_id }}">{{ $fee->classroom->name_class }}</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="inputZip">Academic Year</label>
                            <select class="custom-select mr-sm-2" name="year">
                                @php
                                    $current_year = date('Y');
                                @endphp
                                @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                    <option value="{{ $year }}" {{ $year == $fee->year ? 'selected' : ' ' }}>
                                        {{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Notes</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{ $fee->description }}</textarea>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Submit</button>

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
@endsection

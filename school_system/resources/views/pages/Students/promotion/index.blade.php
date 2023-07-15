@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Students_Promotions
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Students_Promotions
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if (Session::has('error_promotions'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('error_promotions') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <h6 style="color: red;font-family: Cairo">Old Academic Year</h6><br>

                <form method="post" action="{{ route('Promotion.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">Grade</label>
                            <select class="custom-select mr-sm-2" name="grade_id" required>
                                <option selected disabled>Choose...</option>
                                @foreach ($Grades as $Grade)
                                    <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="Classroom_id">Classroom : <span
                                    class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="classroom_id" required>

                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="section_id">section : </label>
                            <select class="custom-select mr-sm-2" name="section_id" required>

                            </select>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">academic_year : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>Choose...</option>
                                    @php
                                        $current_year = date('Y');
                                    @endphp
                                    @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>



                    </div>
                    <br>
                    <h6 style="color: red;font-family: Cairo">New Academic Year</h6><br>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">Grade</label>
                            <select class="custom-select mr-sm-2" name="grade_id_new">
                                <option selected disabled>Choose...</option>
                                @foreach ($Grades as $Grade)
                                    <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="Classroom_id">classrooms : <span
                                    class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="classroom_id_new">

                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="section_id">section : </label>
                            <select class="custom-select mr-sm-2" name="section_id_new">

                            </select>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">academic_year : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year_new">
                                    <option selected disabled>Choose...</option>
                                    @php
                                        $current_year = date('Y');
                                    @endphp
                                    @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>


                    </div>
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
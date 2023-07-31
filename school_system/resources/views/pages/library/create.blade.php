@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Add New Book
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Add New Book
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
                        <form action="{{ route('library.store') }}" method="post" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf
                            <div class="form-row">

                                <div class="col">
                                    <label for="title">Book's Name</label>
                                    <input type="text" name="title" class="form-control">
                                </div>

                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id">Grade : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="grade_id">
                                            <option selected disabled>Choose...</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Classroom_id">Classroom : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="classroom_id">

                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="section_id">section : </label>
                                        <select class="custom-select mr-sm-2" name="section_id">

                                        </select>
                                    </div>
                                </div>

                            </div><br>



                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="academic_year">Attachment : <span
                                                class="text-danger">*</span></label>
                                        <input type="file" accept="application/pdf" name="file_name" required>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                type="submit">Submit</button>
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
@endsection
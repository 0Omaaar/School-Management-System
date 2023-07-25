@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Edit Book {{ $book->title }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Edit Book {{ $book->title }}
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
                        <form action="{{ route('library.update', 'test') }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">

                                <div class="col">
                                    <label for="title">Book's Name : </label>
                                    <input type="text" name="title" value="{{ $book->title }}"
                                        class="form-control">
                                    <input type="hidden" name="id" value="{{ $book->id }}"
                                        class="form-control">
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
                                                <option value="{{ $grade->id }}"
                                                    {{ $book->grade_id == $grade->id ? 'selected' : '' }}>
                                                    {{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Classroom_id">Classroom : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="classroom_id">
                                            <option value="{{ $book->classroom_id }}">
                                                {{ $book->classroom->name_class }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="section_id">Section : </label>
                                        <select class="custom-select mr-sm-2" name="section_id">
                                            <option value="{{ $book->section_id }}">{{ $book->section->name_section }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div><br>

                            <div class="form-row">
                                <div class="col">

                                    <embed src="{{ asset('attachments/library/' . $book->file_name) }}"
                                        type="application/pdf" height="150px" width="100px"><br><br>

                                    <div class="form-group">
                                        <label for="academic_year">Attachments : <span
                                                class="text-danger">*</span></label>
                                        <input type="file" accept="application/pdf" name="file_name">
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

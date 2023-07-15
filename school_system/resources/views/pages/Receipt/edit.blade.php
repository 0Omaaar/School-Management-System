@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Edit Catch Receipt
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Edit Catch Receipt : <label style="color: red">{{ $receipt_student->student->name }}</label>
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

                <form action="{{ route('receipt_students.update', 'test') }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Amount : <span class="text-danger">*</span></label>
                                <input class="form-control" name="debit" value="{{ $receipt_student->debit }}"
                                    type="number">
                                <input type="hidden" name="student_id" value="{{ $receipt_student->student->id }}"
                                    class="form-control">
                                <input type="hidden" name="id" value="{{ $receipt_student->id }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Notes : <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $receipt_student->description }}</textarea>
                            </div>
                        </div>

                    </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Submit</button>
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

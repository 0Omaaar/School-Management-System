@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    Student Profile
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Student Profile
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

<div class="card-body">

    <section style="background-color: #eee;">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4 mt-5 ml-4">
                    <div class="card-body text-center">
                        <img src="{{ URL::asset('assets/images/student.png') }}" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 style="font-family: Cairo" class="my-3">{{ $information->name }}</h5>
                        <p class="text-muted mb-1">{{ $information->email }}</p>
                        <p class="text-muted mb-4">Student</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4 mt-5 mr-3">
                    <div class="card-body">
                        <form action="{{ route('profile-student.update', $information->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Student's Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <input type="text" name="name" value="{{ $information->name }}"
                                            class="form-control">
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Password</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <input type="password" id="password" class="form-control" name="password">
                                    </p><br><br>
                                    <input type="checkbox" class="form-check-input" onclick="myFunction()"
                                        id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Show Password</label>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- row closed -->
@endsection
@section('js')
{{-- @toastr_js --}}
{{-- @toastr_render --}}
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endsection

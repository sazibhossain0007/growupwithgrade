@extends('layouts.dashboard')

@section('style')
 <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('title')Teacher Profile @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Teacher Profile</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Blank Page</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">


	<div class="card card-primary">
		<!-- /.card-header -->
		<!-- form start -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ asset('profile_pics/'.Auth::user()->profile_pic) }}" class="img img-circle img-bordered img-thumbnail img-fluid my-3 ml-2">
                </div>
                <div class="col-md-10">
                    <form role="form" action="{{ url('/teacher/profile/'.Auth::user()->teacher_id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name" value="{{ $teacher_details['name'] }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email" value="{{ $teacher_details['email'] }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter phone number" value="{{ $teacher_details['phone'] }}">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Profile Picture</label>
                                <input id="profile_pic" type="file" class="form-control @error('profile_pic') is-invalid @enderror" name="profile_pic">
{{--                                @if (Auth::user()->profile_pic)--}}
{{--                                    <small>{{ Auth::user()->profile_pic }}</small>--}}
{{--                                @endif--}}
                                @error('profile_pic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>

</section>
<!-- /.content -->
@endsection


@section('script')

<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })

</script>
@endsection

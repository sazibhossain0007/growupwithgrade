@extends('layouts.dashboard')

@section('style') 
 <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('title') Teacher Create @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Teacher Create</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="{{ route('teacher.index')}}">Teacher</a></li>
					<li class="breadcrumb-item active">Teacher Create</li>
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
		<form role="form" action="{{ route('teacher.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
				<div class="form-group">
					<label for="id">Teacher Id: </label>
					<input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" placeholder="Teacher Id" value="{{ old('id') }}">

                    @error('id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="name">Name: </label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}">

					@error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="email">Email: </label>
					<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email" value="{{ old('email') }}">

					@error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="phone">Phone: </label>
					<input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter phone number" value="{{ old('phone') }}">

					@error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="profile_pic">Profile Pic (160x160): </label>
					<input type="file" class="form-control @error('profile_pic') is-invalid @enderror" id="profile_pic" name="profile_pic" value="{{ old('profile_pic') }}">

					@error('profile_pic')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>

				<div class="form-group">
                  <label>Assigned Courses</label>
                  <select class="select2" multiple="multiple" name="courses[]" data-placeholder="Select Course" style="width: 100%;">
                     @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->course_title }}</option>
                  @endforeach
                  </select>
                </div>

				<div class="form-group">
					<label for="password">Password: </label>
					<input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter name" value="">

					@error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				
			</div>
			<!-- /.card-body -->

			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
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
@extends('layouts.dashboard')

@section('title') Student Create @endsection
@section('style') 
 <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Student Create</h1>
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
		@include('partials.notification')
		<!-- form start -->
		<form role="form" action="{{ route('student.store') }}" method="post">
			@csrf
			<div class="card-body">
				<div class="form-group">
					<label for="id">Student Id: </label>
					<input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" placeholder="Student Id" value="{{ old('id') }}">

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
                  <label>Enroll Course</label>
                  <select class="select2" multiple="multiple" name="courses[]" data-placeholder="Select a Course" style="width: 100%;">
		@if(count($courses))
                  @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->course_title }}</option>
                  @endforeach
           @endif

                  </select>
                </div>
                <div class="form-group">
                  <label>Guardian </label>
                  <select class="select2" multiple="multiple" name="guardian" data-placeholder="Select Course" style="width: 100%;">
                  	@foreach($guardians as $guardian)
                    <option value="{{ $guardian->id }}">({{ $guardian->id }}) {{ $guardian->name }}</option>
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
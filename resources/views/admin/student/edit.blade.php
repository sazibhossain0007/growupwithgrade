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
				<h1>Student Update</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('student.index')}}">Students</a></li>
					<li class="breadcrumb-item active">Student Update</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

@include('partials.notification')

	<div class="card card-primary">
		<!-- /.card-header -->

		<!-- form start -->
		<form role="form" action="{{ route('student.update', $student->id) }}" method="post">
			@csrf
			@method('PUT')
			<div class="card-body">
				<div class="form-group">
					<label for="name">Id: </label>
					<input type="text" value="{{ $student->id }}" class="form-control" id="id" name="id" placeholder="Enter name">
					@error('id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="name">Name: </label>
					<input type="text" value="{{ $student->name }}" class="form-control" id="name" name="name" placeholder="Enter name">
					@error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="name">Email: </label>
					<input type="text" value="{{ $student->email }}" class="form-control" id="email" name="email" placeholder="Enter name">
					@error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>

				<div class="form-group">
					<label for="name">Phone: </label>
					<input type="text" value="{{ $student->phone }}" class="form-control" id="phone" name="phone" placeholder="Enter name">
					@error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>

				<div class="form-group">
                  <label>Enroll Course</label>
                  <select class="select2" multiple="multiple" name="courses[]" data-placeholder="Select a Course" style="width: 100%;">
                  @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->course_title }}</option>
                  @endforeach
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
					<label for="name">Password: </label>
					<input type="text" value="" class="form-control" id="password" name="password" placeholder="Enter Password">
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
@extends('layouts.dashboard')

@section('title') course Create @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>course Update</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="{{ route('course.index')}}">Course</a></li>
					<li class="breadcrumb-item active">Course Update</li>
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
		<form role="form" action="{{ route('course.update', $course->id) }}" method="post">
			@csrf
			@method('PUT')
			<div class="card-body">
				<div class="form-group">
					<label for="name">Course Id: </label>
					<input type="text" value="{{ $course->id }}" disabled class="form-control" id="id" name="id" placeholder="Enter name">
					@error('id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="name">Course Title: </label>
					<input type="text" value="{{ $course->course_title }}" class="form-control" id="name" name="course_title" placeholder="Enter name">
					@error('name')
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

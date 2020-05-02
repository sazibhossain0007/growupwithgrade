@extends('layouts.dashboard')

@section('title') Course Details @endsection
@section('style') 
 <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Edit Topic</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('teach.dashboard') }}">Courses</a></li>
					<li class="breadcrumb-item"><a href="{{ route('teach.course.coursedetails.show', $course) }}">Course</a></li>
					<li class="breadcrumb-item"><a href="{{ route('teach.topic.index', $course) }}">List of Topics</a></li>
					<li class="breadcrumb-item active">Edit Topic</li>
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
		<form role="form" action="{{ route('teach.topic.update', [$course,$topic->id]) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="card-body">
				<div class="form-group">
					<label for="name">Topic Title: </label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name" value="{{ $topic->name }}"> 

					@error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="name">Details: </label>
					<textarea type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="details" placeholder="Enter name" value=""> {{ $topic->details }}</textarea>

					@error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="type">File Type:</label>
					    <select class="form-control" id="exampleFormControlSelect1" name="course_matarial1_type">
					      <option >--Select Matarial type--</option>
					      <option value="others">others</option>
					      <option value="audio">Audio</option>
					      <option value="video">Video</option>
					    </select>
				</div>
				<div class="form-group">
					<label>Topic File 1 </label>
					<input type="file" class="form-control" name="course_matarial1" >
				</div>
				<div class="form-group">
					<label for="type">File Type:</label>
					    <select class="form-control" id="exampleFormControlSelect1" name="course_matarial2_type">
					      <option selected value="others">others</option>
					      <option value="audio">Audio</option>
					      <option value="video">Video</option>
					    </select>
				</div>

				<div class="form-group">
					<label>Topic File 2 </label>
					<input type="file" class="form-control" name="course_matarial2" >
				</div>
				<div class="form-group">
					<label for="type">File Type:</label>
					    <select class="form-control" id="exampleFormControlSelect1" name="course_matarial3_type">
					      <option selected value="others">others</option>
					      <option value="audio">Audio</option>
					      <option value="video">Video</option>
					    </select>
				</div>
				<div class="form-group">
					<label>Topic File 3: </label>
					<input type="file" class="form-control" name="course_matarial2" >
				</div>
				
			
				
			</div>
			<!-- /.card-body -->

			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Update</button>
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
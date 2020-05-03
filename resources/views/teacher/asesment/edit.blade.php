@extends('layouts.dashboard')

@section('title') Update Assessment @endsection
@section('style') 
 <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Update Course Assessment</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('teach.dashboard') }}">Courses</a></li>
					<li class="breadcrumb-item"><a href="{{ route('teach.course.coursedetails.show', $course) }}">Course</a></li>
					<li class="breadcrumb-item"><a href="{{ route('teach.topic.index', $course) }}">List of Topics</a></li>
					<li class="breadcrumb-item"><a href="{{ route('teach.topic.show', [$course, $topic]) }}">Topic Detials</a></li>
					<li class="breadcrumb-item"><a href="{{ route('teach.assessment.index', [$course, $topic]) }}">Assessments</a></li>
					<li class="breadcrumb-item active">Update Assessment</li>
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
		<form role="form" action="{{ route('teach.assessment.update', [$course, $topic, $assesment->id]) }}" method="post">
			@csrf
			@method('PUT')
			<div class="card-body">
				<div class="form-group">
					<label for="question">Question: </label>
					<input type="text" class="form-control @error('question') is-invalid @enderror" id="question" name="question" placeholder="Enter question" value="{{ $assesment->question }}">

					@error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="option1">Option 1: </label>
					<input type="text" class="form-control @error('option1') is-invalid @enderror" id="option1" name="option1" placeholder="Enter option 1" value="{{ json_decode($assesment->options)[0] }}">

					@error('option1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="option2">Option 2 </label>
					<input type="text" class="form-control @error('option2') is-invalid @enderror" id="option1" name="option2" placeholder="Enter Option 2" value="{{ json_decode($assesment->options)[1] }}">

					@error('option2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="option3">Option 3 </label>
					<input type="text" class="form-control @error('option3') is-invalid @enderror" id="option3" name="option3" placeholder="Enter Option 3" value="{{ json_decode($assesment->options)[2] }}">

					@error('option3')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="option4">Option 4 </label>
					<input type="text" class="form-control @error('option4') is-invalid @enderror" id="option4" name="option4" placeholder="Enter Option 4" value="{{ json_decode($assesment->options)[3] }}">

					@error('option4')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				
				<div class="form-group">
					<label for="answer">Answer: </label>
					<select name="answer" id="answer" class="form-control @error('answer') is-invalid @enderror">
						<option value="1" {{ $assesment->answer == 1 ? 'selected' : ''}}>Option 1</option>
						<option value="2" {{ $assesment->answer == 2 ? 'selected' : ''}}>Option 2</option>
						<option value="3" {{ $assesment->answer == 3 ? 'selected' : ''}}>Option 3</option>
						<option value="4" {{ $assesment->answer == 4 ? 'selected' : ''}}>Option 4</option>
					</select>

					@error('answer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="mark">Mark:</label>
					<input type="number" class="form-control @error('mark') is-invalid @enderror" id="mark" name="mark" placeholder="" value="{{ $assesment->mark }}" >

                    @error('mark')
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
@extends('layouts.dashboard')

@section('title') Course Assessment @endsection
@section('style') 
 <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Upload Course Assessment</h1>
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
		<form role="form" action="" method="post">
			@csrf
			<div class="card-body">
				<div class="form-group">
					<label for="id">Topic Id:</label>
					<input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" placeholder="Topic Id" value="{{ old('id') }}">

                    @error('id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="question">Question: </label>
					<input type="text" class="form-control @error('question') is-invalid @enderror" id="question" name="question" placeholder="Enter question" value="{{ old('question') }}">

					@error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="option1">Option 1: </label>
					<input type="text" class="form-control @error('option1') is-invalid @enderror" id="option1" name="option1" placeholder="Enter option 1" value="{{ old('option1') }}">

					@error('option1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="option1">Option 2 </label>
					<input type="text" class="form-control @error('option2') is-invalid @enderror" id="option1" name="option2" placeholder="Enter Option 2" value="{{ old('option2') }}">

					@error('option2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="option1">Option 3 </label>
					<input type="text" class="form-control @error('option3') is-invalid @enderror" id="option3" name="option3" placeholder="Enter Option 3" value="{{ old('option3') }}">

					@error('option3')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="option1">Option 4 </label>
					<input type="text" class="form-control @error('option4') is-invalid @enderror" id="option4" name="option4" placeholder="Enter Option 4" value="{{ old('option4') }}">

					@error('option4')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				
				<div class="form-group">
					<label for="option1">Answer: </label>
					<input type="text" class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer" placeholder="Enter Option 4" value="{{ old('answer') }}">

					@error('answer')
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
@extends('layouts.dashboard')

@section('title') Course Matarials @endsection
@section('style') 
 <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Upload Course Matarials</h1>
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
					<label for="type">File Type:</label>
					  
					    <select class="form-control" id="exampleFormControlSelect1">
					      <option>pdf</option>
					      <option>Audio</option>
					      <option>Video</option>
					      <option>others</option>
					   
					    </select>

                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>

				<div class="form-group">
					<label for="location">File Location: </label>
					<input type="file" class="form-control @error('location') is-invalid @enderror" id="location" name="location" placeholder="Enter File location" value="{{ old('location') }}">

					@error('location')
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
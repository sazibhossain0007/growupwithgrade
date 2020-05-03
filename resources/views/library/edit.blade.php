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
				<h1>Library Upload</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('teach.dashboard') }}">Courses</a></li>
					<li class="breadcrumb-item"><a href="{{ route('library.index') }}">Library</a></li>
					<li class="breadcrumb-item active">Update Book</li>
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
		<form role="form" action="{{ route('library.update', $library->id) }}" method="post" enctype="multipart/form-data">
			@csrf
            @method('put')
			<div class="card-body">
				<div class="form-group">
					<label for="name">Book Name: </label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name" value="{{ $library->book_name}}"> 

					@error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="name">Author: </label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="author" placeholder="Enter Author name" value="{{ $library->author}}"> 

					@error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="name">Description: </label>
					<textarea type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="description" placeholder="Enter name" value="">{{ $library->description}}</textarea>

					@error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				
				<div class="form-group">
					<label>File </label>
					<input type="file" class="form-control" name="library_matarial" >
				</div>
				
			
				
			</div>
			<!-- /.card-body -->

			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Upload</button>
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
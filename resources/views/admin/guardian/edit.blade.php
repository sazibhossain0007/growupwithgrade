@extends('layouts.dashboard')

@section('title')Gguardian Create @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Guardian Update</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="{{ route('guardian.index')}}">Guardian</a></li>
					<li class="breadcrumb-item active">Guardian Update</li>
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
		<form role="form" action="{{ route('guardian.update', $guardian->id) }}" method="post">
			@csrf
			@method('PUT')
			<div class="card-body">
				<div class="form-group">
					<label for="name">Id: </label>
					<input type="text" value="{{ $guardian->id }}" disabled class="form-control" id="id" name="id" placeholder="Enter name">
					@error('id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="name">Name: </label>
					<input type="text" value="{{ $guardian->name }}" class="form-control" id="name" name="name" placeholder="Enter name">
					@error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="name">Email: </label>
					<input type="text" value="{{ $guardian->email }}" disabled class="form-control" id="email" name="email" placeholder="Enter name">
					@error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="name">Phone: </label>
					<input type="text" value="{{ $guardian->phone }}" class="form-control" id="phone" name="phone" placeholder="Enter name">
					@error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="name">Password: </label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter name">
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

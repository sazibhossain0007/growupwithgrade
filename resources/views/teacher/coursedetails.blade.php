@extends('layouts.dashboard')

@section('title') {{ $course->course_title }} @endsection

@section('content')

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>{{ $course->course_title }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">{{ $course->course_title }}</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
               <a href="{{ route('teach.topic.index', $course)}}" class="btn btn-primary"> List Of Topic</a>
               <a href="{{ route('teach.topic.index', $course)}}" class="btn btn-secondary"> My Student</a>

            </section>
            <!-- /.content -->
@endsection

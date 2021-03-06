@extends('layouts.dashboard')

@section('title') Blank @endsection

@section('content')

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Courses</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Courses</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
 <!-- services -->
    <div class="services py-5" id="what">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title-w3 mb-xl-5 mb-sm-4 mb-2 text-center text-wh font-weight-bold">My Courses</h3>
            <div class="row w3pvtits-services-row text-center">
                @if(!empty($courses))
                    @foreach($courses as $course)
                        <div class="col-lg-4 serv-w3mk mt-5">
                            <div class="w3pvtits-services-grids">
                                <span class="fa fa-leanpub ser-icon" aria-hidden="true"></span>
                                <h4 class="text-bl my-4">{{ $course->course_title }}</h4>
                                <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{Auth::user()->course_prograss($course->id, Auth::id())}}%;" aria-valuenow="{{Auth::user()->course_prograss($course->id, Auth::id())}}" aria-valuemin="0" aria-valuemax="100">{{Auth::user()->course_prograss($course->id, Auth::id())}}%</div>
                                </div>
                                <a class="service-btn mt-xl-5 mt-4 btn" href="{{ route('student.coursedetails', $course->id) }}">Read More<span class="fa fa-long-arrow-right ml-2"></span></a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- //services -->

            </section>
            <!-- /.content -->
@endsection

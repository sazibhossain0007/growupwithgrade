@extends('layouts.dashboard')

@section('title') Blank @endsection

@section('content')

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Topic Detials</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('teach.dashboard') }}">Courses</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('teach.course.coursedetails.show', $course) }}">Course</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('teach.topic.index', $course) }}">List of Topics</a></li>
                                <li class="breadcrumb-item active">Topic Detials</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <h2 style="text-align: center;">{{ $topic->course->course_title}}</h2>
                 <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Topic </th>
                        <th>Description</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <tr>
                        <td>{{ $topic->name }}</td>
                        <td>{{ $topic->details }}</td>
                        <td>
                            @if($topic->course_matarial1)
                            <a class="btn btn-primary" href="{{ asset($topic->course_matarial1) }}">Download</a>
                            @endif
                            @if($topic->course_matarial2)
                            <a class="btn btn-primary" href="{{ asset($topic->course_matarial2) }}">Download</a>
                            @endif
                            @if($topic->course_matarial3)
                            <a class="btn btn-primary" href="{{ asset($topic->course_matarial3) }}">Download</a>
                            @endif
                        </td>

                        
                        <td>
                            <a class="btn btn-primary" href="{{ route('teach.assessment.index', [$course, $topic->id]) }}">Assessments</a>

                        </td>
                    </tr>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th>Topic </th>
                        <th>Description</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>

            </section>
            <!-- /.content -->
@endsection

@extends('layouts.dashboard')

@section('title')List Of Assesments @endsection

@section('content')

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Assesments</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('teach.dashboard') }}">Courses</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('teach.course.coursedetails.show', $course) }}">Course</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('teach.topic.index', $course) }}">List of Topics</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('teach.topic.show', [$course, $topic]) }}">Topic Detials</a></li>
                                <li class="breadcrumb-item active">Assesments</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            @include('partials.notification')
            <!-- Main content -->
            <section class="content">
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Topic List</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @if(!empty($assesments))
                   @foreach($assesments as $assesment)
                    <tr>
                        <td> 
                            <a href="{{ route('teach.assessment.edit', [$course, $topic, $assesment->id]) }}" class="btn btn-primary">{{ $assesment->question }}</a>
                        </td>
                        
                        <td>
                            <a class="btn btn-primary" href="{{ route('teach.assessment.edit', [$course, $topic, $assesment->id]) }}">Edit</a>

                            <form role="form" action="{{ route('teach.assessment.destroy', [$course, $topic, $assesment->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                    <button onclick="return confirm('Are you sure to delete this student?')" type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th>List of Topic</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            <hr>

             <a href="{{ route('teach.assessment.create', [$course, $topic])}}" class="btn btn-primary" style="align:center"> Add New Assessment</a>

            </section>
            <!-- /.content -->
@endsection

@extends('layouts.dashboard')

@section('title')List Of Topic @endsection

@section('content')

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>List of Topics</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('teach.dashboard') }}">Courses</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('teach.course.coursedetails.show', $course) }}">Course</a></li>
                                <li class="breadcrumb-item active">List of Topics</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

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
                   @if(!empty($topics))
                   @foreach($topics as $topic)
                    <tr>
                        <td> 
                            <a href="{{ route('teach.topic.show', [$course, $topic->id]) }}" class="btn btn-primary">{{ $topic->name }}</a>
                        </td>
                        
                        <td>
                            <a class="btn btn-primary" href="{{ route('teach.topic.edit', [$course, $topic->id]) }}">Edit</a>

                            <form role="form" action="{{ route('teach.topic.destroy', [$course, $topic->id]) }}" method="post">
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

             <a href="{{ route('teach.topic.create', $course)}}" class="btn btn-primary" style="align:center"> Add New Topic</a>

            </section>
            <!-- /.content -->
@endsection

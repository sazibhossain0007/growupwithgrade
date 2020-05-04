@extends('layouts.dashboard')

@section('title')Library @endsection

@section('content')

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1> Library </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('teach.dashboard') }}">Courses</a></li>
                                <li class="breadcrumb-item active">Library</li>
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
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Matarial</th>
                        @if(Auth::guard('student')->check())
                        @elseif(Auth::guard('guardian')->check())
                        @else
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                   
                @if(!empty($libraries))
                   @foreach($libraries as $library)
                    <tr>
                        <td>{{ $library->book_name }}</td>
                        <td>{{ $library->author }}</td>
                        <td>{{ $library->description }}</td>
                        
                        <td>
                            @if($library->library_matarials)
                                <a href="{{ asset($library->library_matarials) }}" class="btn btn-primary">Download</a>
                            @endif
                        </td>
                        @if(Auth::guard('student')->check())
                        @elseif(Auth::guard('guardian')->check())
                        @else
                        <td>
                            <a class="btn btn-primary" href="{{ route('library.edit', $library->id) }}">Edit</a>

                            <form role="form" action="{{ route('library.destroy', $library->id) }}" method="post">
                                @csrf
                                @method('delete')
                                    <button onclick="return confirm('Are you sure to delete this student?')" type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                @endif
                   
                </tbody>
                <tfoot>
                    <tr>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Matarial</th>
                        @if(Auth::guard('student')->check())
                        @elseif(Auth::guard('guardian')->check())
                        @else
                        <th>Action</th>
                        @endif
                    </tr>
                </tfoot>
            </table>
            <hr>

            @if(Auth::guard('student')->check())
            @elseif(Auth::guard('guardian')->check())
            @else
             <a href="{{ route('library.create')}}" class="btn btn-primary" style="align:center"> Add New Book</a>
            @endif

            </section>
            <!-- /.content -->
@endsection

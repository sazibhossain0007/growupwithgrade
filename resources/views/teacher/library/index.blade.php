@extends('layouts.dashboard')

@section('title')List Of Topic @endsection

@section('content')

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Blank Page for teacher</h1>
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
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>List of my uploads</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <tr>
                        <td> 
                            <a href="" class="btn btn-primary"></a>
                        </td>
                        
                        <td>
                            <a class="btn btn-primary" href="">Edit</a>

                            <form role="form" action="" method="post">
                                @csrf
                                @method('delete')
                                    <button onclick="return confirm('Are you sure to delete this student?')" type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                   
                </tbody>
                <tfoot>
                    <tr>
                        <th>List of my uploads</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            <hr>

             <a href="{{ route('teach.library.create')}}" class="btn btn-primary" style="align:center"> Add New Book</a>

            </section>
            <!-- /.content -->
@endsection

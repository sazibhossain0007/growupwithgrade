@extends('layouts.dashboard')

@section('title') Blank @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Assessments</h1>
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

    <form action="{{ route('student.coursedetails.assessments.post', [$course->id, $topic->id]) }}" method="post">
        @csrf

        <div class="card-body">
            @if(count($assessments))
            @php 
            $i = 0
            @endphp
            @foreach($assessments as $assesment)
            @php 
            $i++
            @endphp
            <div class="form-group">
                <h4>{{$i}}. {{ $assesment->question}}</h4>
                <p>Mark: 3</p>
                <div class="row">
                    @foreach(json_decode($assesment->options) as $key => $option)
                    <div class="radio col-6">
                        <label>
                            <input type="radio" name="question-{{ $assesment->id}}" value="{{ $key+1 }}"> {{  $option }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @else
        <p>No Assesment Found</p>
        @endif
    </form>
</section>
<!-- /.content -->
@endsection
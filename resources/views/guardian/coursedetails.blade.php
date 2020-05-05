@extends('layouts.dashboard')

@section('title') Course Topics @endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Course Topics</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('guardian.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Course Topic</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div id="accordion">
        @if(!empty($topics))
            @foreach($topics as $topic)
                <div class="card">
                    <div class="card-header" id="heading{{ $topic->id }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{ $topic->id }}" aria-expanded="false" aria-controls="collapse{{ $topic->id }}">
                                {{ $topic->name }}
                            </button>
                        </h5>
                    </div>

                    <div id="collapse{{ $topic->id }}" class="collapse" aria-labelledby="heading{{ $topic->id }}" data-parent="#accordion">
                        <div class="card-body">
                            <h3>Details</h3>
                            {{ $topic->details }}

                            <h3>Course Matarials</h3>
                                @if($topic->course_matarial1)
                                    <a class="btn btn-primary" href="{{ asset($topic->course_matarial1) }}">Download</a>
                                @endif
                                @if($topic->course_matarial2)
                                    <a class="btn btn-primary" href="{{ asset($topic->course_matarial2) }}">Download</a>
                                @endif
                                @if($topic->course_matarial3)
                                    <a class="btn btn-primary" href="{{ asset($topic->course_matarial3) }}">Download</a>
                                @endif

                            <h3>Assesments</h3>
                                @if(empty($topic->student_assisment))
                                <p>Assesment is not submited</p>
                                @else 
                                <p>Your Assesment Mark: {{ $topic->student_assisment->mark }}</p>
                                @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

</section>
<!-- /.content -->
@endsection
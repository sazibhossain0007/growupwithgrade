<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


<!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <title>Forum</title>
    <style>
        #brandLogo {
            font-weight: 600;
            color: orange;
        }
        .navbar-brand{
            font-size: 40px;
            letter-spacing: 5px;
        }
    </style>
</head>
<body>
<!-- Image and text -->
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand ml-5" href="#">
        <span id="brandLogo">F</span>o<span id="brandLogo">r</span>u<span id="brandLogo">m</span>
    </a>
    <a href="{{url('/teacher/dashboard')}}" class="pull-right pr-5">Go back</a>
</nav>


<div class="container mt-5">

    @include('flash-message')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-md-12">
        <button type="button" class="btn btn-success btn-sm my-2" data-toggle="modal" data-target="#addPost">Add new</button>

        @foreach($allPosts as $key => $post)
        <div class="row bg-light p-3 mb-2 border rounded">
            <div class="col-md-1">
                <img src="{{asset('img/no-user.png')}}" alt="" width="100%" height="100%" class=" border border-dark rounded-circle p-1">
            </div>
            <div class="col-md-11 text-left">
                <h4 class="m-0">{{ $post['post_title'] }}</h4>
                <small><strong>Created by:</strong> {{$creator['name']}} at {{ date('Y-m-d',strtotime($post['created_at'])) }}</small>
                <p>{{ $post['post_details'] }}</p>
            </div>


            <div class="col-md-1"></div>
            <div class="col-md-11">
                    @if(Auth::user()->getTable() == 'teachers')
                    <form action="{{url('teacher/comment/addNew')}}" method="post">
                    @endif
                    @if(Auth::user()->getTable() == 'students')
                    <form action="{{url('student/comment/addNew')}}" method="post">
                    @endif
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post['id']}}">
                    <textarea class="form-control" name="comments" id="comments"></textarea>
                    <input type="submit" class="btn btn-sm btn-success mt-3" value="Comment">
                </form>
            </div>


        </div>
        @endforeach

{{--        @for ($i = 0; $i < sizeof($allPosts); $i++)--}}
{{--         {{$allPosts[$i] .' '. $creator[$i]}}--}}
{{--        @endfor--}}


        <!-- Modal -->
        <div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    @if(Auth::user()->getTable() == 'teachers')
                    <form action="{{url('teacher/forum/addNew')}}" method="post">
                    @endif
                    @if(Auth::user()->getTable() == 'students')
                    <form action="{{url('student/forum/addNew')}}" method="post">
                    @endif
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" class="form-control" id="title" name="post_title" value="{{old('post_title')}}">
                            </div>
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <textarea class="form-control" id="post_details" name="post_details">{{old('post_details')}}</textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>


<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>
<script>
    $(document).ready(function () {
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 3000);
    });
</script>
</body>
</html>

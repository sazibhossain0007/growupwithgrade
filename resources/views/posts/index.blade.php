@extends('layouts.post_layout')

@section('content')
    <div class="col-md-12">
        <button type="button" class="btn btn-success btn-sm my-2" data-toggle="modal" data-target="#addPost">Add new</button>
    @if(count($allPosts)>0)
        @foreach($allPosts as $key => $post)
        <div class="row bg-light p-3 mb-2 border rounded">
            <div class="col-md-1">
                <img src="{{asset('profile_pics/'.$creator[$key]['profile_pic'])}}" alt="" width="100%" height="100%" class=" border border-dark rounded-circle p-1">
            </div>
            <div class="col-md-11 text-left">
                <h4 class="m-0"><a href="{{url('teacher/post/'.$post['id'])}}">{{ $post['post_title'] }}</a></h4>
                <small><strong>Created by:</strong> {{$creator[$key]['name']}} at {{ date('Y-m-d',strtotime($post['created_at'])) }}</small>
                <p>{{ $post['post_details'] }}</p>
            </div>
        </div>
        @endforeach
        @else
        <p>No available post!! Create One!!!</p>
        @endif

{{--        @for ($i = 0; $i < sizeof($allPosts); $i++)--}}
{{--         {{$allPosts[$i] .' '. $creator[$i]}}--}}
{{--        @endfor--}}


        <!-- Modal -->
        <div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <?php
                    if(Auth::user()->getTable() == 'teachers'){
                        $url = 'teacher/forum/addNew';
                    }elseif (Auth::user()->getTable() == 'students'){
                        $url = 'student/forum/addNew';
                    }
                    ?>

                    <form action="{{url($url)}}" method="post">
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
                                <label for="title">Post Description</label>
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


@endsection

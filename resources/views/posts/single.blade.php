@extends('layouts.post_layout')

@section('content')
<?php
if (Auth::user()->getTable() == 'teachers') {
    $url = 'teacher';
} elseif (Auth::user()->getTable() == 'students') {
    $url = 'student';
}
?>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-12 bg-light p-4">
            <h4 class="m-0">{{ $post['post_title'] }}</h4>
            <small><strong>Created by:</strong> {{$creator['name']}} at {{$post['created_at']}}</small>
            <p>{{ $post['post_details'] }}</p>
            <hr>
            @if($creator['name'] == Auth::user()->name)
            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editPost">Edit</button>
            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#deletePost">Delete</button>
            @endif


            <!-- Modal -->
            <div class="modal fade" id="editPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <form action="{{url($url . '/forum/edit/'.$post['id'])}}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit new post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">Post Title</label>
                                    <input type="text" class="form-control" id="title" name="post_title" value="{{$post['post_title']}}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Post Description</label>
                                    <textarea class="form-control" id="post_details" name="post_details">{{$post['post_details']}}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="deletePost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <form action="{{url($url . '/forum/delete/'.$post['id'])}}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete {{$post['post_title']}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-danger">Are you sure to delete the post???</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@if($url == 'teacher')
@foreach($post_comment as $comment)
    <div class="row">
        <div class="col-md-12 p-4">
            <div class="col-md-8">
                <p>{{ $comment['comments'] }}</p>
            </div>
            <div class="col-md-3">
                <small class="pull-right"><strong>Commented by:</strong> {{$comment_user['name']}} at {{$comment['created_at']}}</small>
            </div>
        </div>
    </div>
    @endforeach
@endif
    <div class="row">
        <div class="col-md-12">
            <form action="{{url($url . '/comment/addNew')}}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{$post['id']}}">
                <textarea class="form-control" name="comments" id="comments"></textarea>
                <input type="submit" class="btn btn-sm btn-success mt-3" value="Comment">
            </form>
        </div>
    </div>
</div>


@endsection
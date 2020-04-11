<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $post_user ='';
        $posts = Post::orderBy('created_at', 'desc')->get();
        foreach ($posts as $post) {
            if(substr($post['created_by'],0,2) == 't_'){
                $post_user = Teacher::where('teacher_id',substr($post['created_by'],2))->first(['name'])->toArray();
            }
            if(substr($post['created_by'],0,2) == 's_'){
                $post_user = Student::where('student_id',substr($post['created_by'],2))->first(['name'])->toArray();
            }
        }
        $data =array(
            'allPosts' => $posts,
            'creator' => $post_user,
        );
//        dd($data);
        return view('posts.index')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title'          =>  'required',
            'post_details'         =>  'required'
        ]);

        $newPost = new Post();
        $newPost->post_title = $request['post_title'];
        $newPost->post_details = $request['post_details'];
        if (Auth::user()->getTable() == 'teachers'){
            $newPost->created_by = 't_'.Auth::user()->teacher_id;
        }
        if (Auth::user()->getTable() == 'students'){
            $newPost->created_by = 's_'.Auth::user()->student_id;
        }
        if($newPost->save()){
            return back()->with('success','Post added succesfully!!');
        }
    }


    public function storeComment(Request $request)
    {
        $request->validate([
            'comments'          =>  'required',
        ]);
        $newComment = new Comment();
        $newComment->comments = $request['comments'];
        $newComment->post_id = $request['post_id'];
        if (Auth::user()->getTable() == 'teachers'){
            $newComment->created_by = 't_'.Auth::user()->teacher_id;
        }
        if (Auth::user()->getTable() == 'students'){
            $newComment->created_by = 's_'.Auth::user()->student_id;
        }
        if($newComment->save()){
            return back()->with('success','Post added succesfully!!');
        }
    }
}

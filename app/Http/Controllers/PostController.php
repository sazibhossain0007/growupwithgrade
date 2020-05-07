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
        $post_user =[];
        $posts = Post::orderBy('created_at', 'desc')->get();
        foreach ($posts as $key => $post) {
            if(substr($post['created_by'],0,2) == 't_'){
                $post_user[$key] = Teacher::where('teacher_id',substr($post['created_by'],2))->first(['name','profile_pic'])->toArray();
            }elseif(substr($post['created_by'],0,2) == 's_'){
                $post_user[$key] = Student::where('student_id',substr($post['created_by'],2))->first(['name','profile_pic'])->toArray();
            }
        }
        $data = array(
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

    public function singlePost($id)
    {
        $post = Post::findorfail($id);
        $post_user ='';
        $comment_user ='';
        if(substr($post['created_by'],0,2) == 't_'){
            $post_user = Teacher::where('teacher_id',substr($post['created_by'],2))->first(['name'])->toArray();
        }
        if(substr($post['created_by'],0,2) == 's_'){
            $post_user = Student::where('student_id',substr($post['created_by'],2))->first(['name'])->toArray();
        }

        $post_comment = Comment::where('post_id',$id)->get();
//        dd($post_comment[0]['created_by']);
        foreach ($post_comment as $item) {
            if(substr($item['created_by'],0,2) == 't_'){
                $comment_user = Teacher::where('teacher_id',substr($item['created_by'],2))->first(['name']);
            }
            if(substr($item['created_by'],0,2) == 's_'){
                $comment_user = Student::where('student_id',substr($item['created_by'],2))->first(['name']);
            }
        }
        $data =array(
            'post' => $post,
            'creator' => $post_user,
            'post_comment' => $post_comment,
            'comment_user' => $comment_user,
        );
        return view('posts.single')->with($data);
    }

    public function editPost(Request $request, $id)
    {
        $post = Post::find($id);
        $request->validate([
            'post_title'          =>  'required',
            'post_details'         =>  'required'
        ]);

        $post->post_title = $request['post_title'];
        $post->post_details = $request['post_details'];
        if (Auth::user()->getTable() == 'teachers'){
            $post->created_by = 't_'.Auth::user()->teacher_id;
        }
        if (Auth::user()->getTable() == 'students'){
            $post->created_by = 's_'.Auth::user()->student_id;
        }
        if($post->save()){
            return back()->with('success','Post updated succesfully!!');
        }
    }
    public function deletePost($id)
    {
        Post::find($id)->delete();

        if (Auth::user()->getTable() == 'teachers'){
            return redirect('teacher/forum')->with('success','Post deleted succesfully!!');
        }
        if (Auth::user()->getTable() == 'students'){
            return redirect('student/forum')->with('success','Post deleted succesfully!!');
        }

    }

}

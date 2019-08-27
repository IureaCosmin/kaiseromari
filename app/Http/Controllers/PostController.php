<?php

namespace App\Http\Controllers;
use App\Post;
use App\File;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $posts = Post::orderBy('created_at', 'DESC')->latest()->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function show(Post $post){
        return view('admin.posts.show', compact('post'));
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function edit(Post $post){
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Post $post){

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'cover' => '',
        ]);

        if(request('cover')){
            $image = request('cover')->store('news', 'public');
            $imageArray = ['cover' => $image];
        }

        $post->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect(route('posts.index'));
    }

    public function store(){
        // foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
        //     $temp = $_FILES["files"]["tmp_name"][$key];
        //     $name = $_FILES["files"]["name"][$key];
             
        //     if(empty($temp))
        //     {
        //         break;
        //     }
        //     move_uploaded_file($temp,"storage/".$name);
        // }

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'cover' => ['image', 'required'],
        ]);

        $image = request('cover')->store('/uploads/news', 'public');
         
        $post = new Post;
        $post->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'content' => $data['content'],
            'cover' => $image,
        ]);

        return redirect(route('posts.index'));
    }

    public function delete($id){
        // Post::find($id)->delete();
        // return redirect(route('posts.index'));
        return post::find($id);
    }

    public function trash(){
        $trashed = Post::onlyTrashed()->get();
        return view('admin.posts.trash', compact('trashed'));
    }
    
    public function restore($id){
        $post = Post::withTrashed()->find($id)->restore();
        return redirect('/posts/trash');
    }

}

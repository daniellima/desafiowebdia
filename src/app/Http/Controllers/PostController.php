<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostBussines;
use App\Post;

class PostController extends Controller
{
    public function getIndex() {
        
        $data['posts'] = PostBussines::listPostsOrderedByCreationTime();
        
        return view('index')->with($data);
    }
    
    public function getCreate() {
        
        $data['message'] = session('message', null);
        
        return view('admin/post_create')->with($data);
    }
    
    public function postCreate(Request $request) {
        
        $this->validate($request, ['image' => 'required|image']);
        
        $post = new Post($request->only('title', 'subtitle', 'second-title', 'content'));
        
        PostBussines::savePost(
            $post, 
            $request->image->path(), 
            $request->image->extension(),
            $imageSaveDir = public_path('storage/'));
        
        return back()->with('message', 'Post created successfully.');
    }
}
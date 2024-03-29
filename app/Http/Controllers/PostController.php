<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Category;

class PostController extends Controller
{
    public function index(Request $request,Post $post)
    {
        $keyword = $request->query('keyword');
       
        if(empty($keyword)){
            $posts = $post->getPaginateByLimit(5);
        }else{
            $posts = $post->searchPaginateByLimit($keyword,5 );
        }
        
        
        return view('posts.index')->with([
            'posts' => $posts,
            'keyword' => $keyword,
        ]);
    }
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    public function create(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
    }
    public function store(Post $post ,PostRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}

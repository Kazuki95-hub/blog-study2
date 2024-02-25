<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view ('posts.index')->with(['posts' => $post->getPaginateByLimit(1)]);
        //ビューを返している。その際に、posts.indexというビューを表示して、
        //その中にpostsという変数を渡す。
        //この変数には$post->get()で取得した投稿のデータが含まれている。
    }
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
}

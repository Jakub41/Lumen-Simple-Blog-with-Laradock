<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function show($post)
    {
        // find post with id of $post
        $post =Post::find($post);

        // check if post exsist
        if ($post===null)
        {
            return 'Blog post not found';
        }
        return $post;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'string|required', //validate if provided title is string and is present
            'description' => 'string|required',//validate if provided description is string and is present
        ]);

        $post = Post::create($request->all());

        return $post;
    }

    public function destroy($post)
    {
        // delete blog post with id of $post
        $status = Post::destroy($post);
        // check if post exsist
        if ($status===0)
        {
            return 'Blog post not found';
        }
        // returns true if the post is successfully deleted
        return $status;
    }
}

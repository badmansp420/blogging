<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $postData = $request->validate(['title' => 'required', 'content' => 'required']);

        // $postData['title'] = strip_tags($postData['title']);
        // $postData['content'] = strip_tags($postData['content']);
        $postData['user_id'] = auth()->id();

        Post::create($postData);
        return redirect('/');
    }

    public function editPost(Post $post, Request $request)
    {
        // if (auth()->user()->id !== $post['user_id']) {
        //     return redirect('/');
        // }
        return view('blog-post', ['post' => $post]);
    }

    public function updatePost(Post $post, Request $request)
    {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        $updatePostData = $request->validate(['title' => 'required', 'content' => 'required']);
        // $updatePostData['title'] = strip_tags($updatePostData['title']);
        // $updatePostData['content'] = strip_tags($updatePostData['content']);
        $post->update($updatePostData);
        return redirect('/');
    }
    public function deletePost(Post $post)
    {
        if (auth()->user()->id === $post['user_id']) {
            $post->delete();
            // return redirect('/');
        }
        return redirect('/');
    }
}

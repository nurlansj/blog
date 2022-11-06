<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $date = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);
        $comments = Comment::where('post_id', $post->id)
            ->orderBy('created_at', 'DESC')
            ->paginate($perPage = 3, $columns = ['*'], $pageName = 'comments');
        return view('posts.show', compact('post', 'date', 'relatedPosts', 'comments'));
    }
}

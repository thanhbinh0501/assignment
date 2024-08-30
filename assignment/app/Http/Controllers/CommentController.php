<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'article_id' => 'required|exists:articles,id',
        'comment' => 'required|string|max:1000',
    ]);

    $comment = new Comment();
    $comment->article_id = $validated['article_id'];
    $comment->user_id = auth()->id();
    $comment->content = $validated['comment'];
    $comment->save();

    return redirect()->back()->with('success', 'Bình luận đã được gửi.');
}
}

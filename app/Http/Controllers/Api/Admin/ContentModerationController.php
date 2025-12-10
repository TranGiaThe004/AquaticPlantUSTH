<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\BaseApiController;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Question;
use Illuminate\Http\Request;

class ContentModerationController extends BaseApiController
{
    // DELETE /api/admin/questions/{question}
    public function deleteQuestion(Request $request, Question $question)
    {
        $question->delete();

        return $this->success(null, 'Question deleted.');
    }

    // DELETE /api/admin/posts/{post}
    public function deletePost(Request $request, Post $post)
    {
        $post->delete();

        return $this->success(null, 'Post deleted.');
    }

    // DELETE /api/admin/comments/{comment}
    public function deleteComment(Request $request, Comment $comment)
    {
        $comment->delete();

        return $this->success(null, 'Comment deleted.');
    }
}

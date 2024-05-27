<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\EditCommentRequest;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Job $job)
    {
        Comment::create([
            'user_id' => auth()->user()->id,
            'job_listing_id' => $job->id,
            'content' => $request->validated()['comment'],
        ]);

        return to_route('jobs.show', $job);
    }

    public function update(EditCommentRequest $request, Comment $comment)
    {
        $job = $comment->job;
        $comment->update([
            'content' => $request->validated()['updated-comment'],
        ]);

        return to_route('jobs.show', $job);
    }

    public function destroy(Comment $comment)
    {
        $job = $comment->job;
        $comment->delete();
        return to_route('jobs.show', $job);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Idea;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request,int $id){
        $idea=Idea::whereId($id)->first();
        if(is_null($idea)){
            abort(404);
        }
        Comment::create([
            'idea_id' => $idea->id,
            'content' => $request->get('content'),
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('dashboard')
            ->with('success', 'Comment added successfully!');
    }
}

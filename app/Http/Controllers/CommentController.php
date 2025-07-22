<?php

namespace App\Http\Controllers;

use App\Dtos\CreateCommentDto;
use App\Http\Requests\Comments\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Idea;
use App\Services\IdeaServiceInterface;

class CommentController extends Controller
{
    public function __construct(private readonly IdeaServiceInterface $ideaService){}
    public function store(CreateCommentRequest $request,int $id){
        $idea=$this->ideaService->findById($id,false);
        if(is_null($idea)){
            abort(404);
        }
        $comment = CreateCommentDto::fromFormRequest($request);
        Comment::create([
            'idea_id' => $idea->id,
            'content' => $request->get('content'),
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('dashboard')
            ->with('success', 'Comment added successfully!');
    }
}

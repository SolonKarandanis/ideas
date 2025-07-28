<?php

namespace App\Http\Controllers;

use App\Dtos\CreateCommentDto;
use App\Http\Requests\Comments\CreateCommentRequest;
use App\Services\CommentServiceInterface;
use App\Services\IdeaServiceInterface;

class CommentController extends Controller
{
    public function __construct(
        private readonly IdeaServiceInterface $ideaService,
        private readonly CommentServiceInterface $commentService,
    ){}
    public function store(CreateCommentRequest $request,int $id){
        $idea=$this->ideaService->findById($id,false);
        if(is_null($idea)){
            abort(404);
        }
        $comment = CreateCommentDto::fromFormRequest($request);
        $comment->setUserId(auth()->id());
        $comment->setIdeaId($idea->id);
        $this->commentService->createComment($comment);
        return redirect()->route('dashboard')
            ->with('success', 'Comment added successfully!');
    }
}

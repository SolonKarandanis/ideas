<?php

namespace App\Repositories;

use App\Dtos\CreateCommentDto;
use App\Models\Comment;
use App\Repositories\CommentRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class CommentRepository implements CommentRepositoryInterface
{

    public function modelQuery(): Builder|Comment
    {
        return Comment::query();
    }
    public function createComment(CreateCommentDto $createCommentDto): Builder|Comment
    {
        return $this->modelQuery()->create([
            'content' => $createCommentDto->getContent(),
            'user_id' => $createCommentDto->getUserId(),
            'idea_id' => $createCommentDto->getIdeaId(),
        ]);
    }


}

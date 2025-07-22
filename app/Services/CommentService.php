<?php

namespace App\Services;

use App\Dtos\CreateCommentDto;
use App\Models\Comment;
use App\Repositories\CommentRepositoryInterface;
use App\Services\CommentServiceInterface;
use Illuminate\Database\Eloquent\Builder;

class CommentService implements CommentServiceInterface
{
    public function __construct(private readonly CommentRepositoryInterface $commentRepository){}

    public function createComment(CreateCommentDto $createCommentDto): Builder|Comment
    {
        return $this->commentRepository->createComment($createCommentDto);
    }
}

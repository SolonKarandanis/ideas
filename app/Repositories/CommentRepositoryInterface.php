<?php

namespace App\Repositories;

use App\Dtos\CreateCommentDto;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Builder;

interface CommentRepositoryInterface
{
    public function modelQuery(): Builder|Comment;
    public function createComment(CreateCommentDto $createCommentDto):Builder|Comment;
}

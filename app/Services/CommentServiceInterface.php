<?php

namespace App\Services;

use App\Dtos\CreateCommentDto;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Builder;

interface CommentServiceInterface
{
    public function createComment(CreateCommentDto $createCommentDto): Builder|Comment;
}

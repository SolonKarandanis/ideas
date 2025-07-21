<?php

namespace App\Services;

use App\Dtos\IdeaDto;
use App\Models\Idea;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

interface IdeaServiceInterface
{

    public function findById(int $id): ?Idea;

    public function searchIdeas(string $searchQuery): LengthAwarePaginator;
    public function createIdea(IdeaDto $ideaDto):Builder|Idea;

    public function updateIdea(IdeaDto $ideaDto):Builder|Idea;

    public function deleteIdea(int $id): bool;

}

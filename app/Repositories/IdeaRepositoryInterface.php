<?php

namespace App\Repositories;

use App\Dtos\IdeaDto;
use App\Models\Idea;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

interface IdeaRepositoryInterface
{
    public function modelQuery(): Builder|Idea;

    public function findById(int $id): ?Idea;

    public function findByIdWithRelations(int $id): ?Idea;

    public function searchIdeas(string|null $searchQuery): LengthAwarePaginator;

    public function createIdea(IdeaDto $ideaDto):Builder|Idea;

    public function updateIdea(Idea $idea):Builder|Idea;

    public function deleteIdea(Idea $idea): bool;
}

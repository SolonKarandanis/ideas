<?php

namespace App\Services;

use App\Dtos\IdeaDto;
use App\Models\Idea;
use App\Repositories\IdeaRepositoryInterface;
use App\Services\IdeaServiceInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class IdeaService implements IdeaServiceInterface
{
    public function __construct(private readonly IdeaRepositoryInterface $ideaRepository){}

    public function findById(int $id): ?Idea
    {
        $idea= $this->ideaRepository->findById($id);
        if (!$idea) {
            throw new ModelNotFoundException("Idea not found");
        }
        return $idea;
    }

    public function searchIdeas(string $searchQuery): LengthAwarePaginator
    {
        return $this->ideaRepository->searchIdeas($searchQuery);
    }

    public function createIdea(IdeaDto $ideaDto): Builder|Idea
    {
        return $this->ideaRepository->createIdea($ideaDto);
    }

    public function updateIdea(IdeaDto $ideaDto): Builder|Idea
    {
        $idea = $this->findById($ideaDto->getId());
        $idea->content = $ideaDto->getContent();
        return $this->ideaRepository->updateIdea($idea);
    }

    public function deleteIdea(int $id): bool
    {
        $idea = $this->findById($id);
        return $idea->delete();
    }
}

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

    public function findById(int $id, bool $withRelations=false): ?Idea
    {
        $idea= $this->ideaRepository->findById($id);
        if (!$idea) {
            throw new ModelNotFoundException("Idea not found");
        }
        if($withRelations){
            return $this->ideaRepository->findByIdWithRelations($id);
        }
        return $idea;
    }

    public function searchIdeas(string|null $searchQuery): LengthAwarePaginator
    {
        return $this->ideaRepository->searchIdeas($searchQuery);
    }

    public function createIdea(IdeaDto $ideaDto): Builder|Idea
    {
        return $this->ideaRepository->createIdea($ideaDto);
    }

    public function updateIdea(IdeaDto $ideaDto): Builder|Idea
    {
        $idea = $this->findById($ideaDto->getId(),false);
        $idea->content = $ideaDto->getContent();
        return $this->ideaRepository->updateIdea($idea);
    }

    public function deleteIdea(int $id): bool
    {
        $idea = $this->findById($id,false);
        return $idea->delete();
    }
}

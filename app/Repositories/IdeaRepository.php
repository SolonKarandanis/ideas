<?php

namespace App\Repositories;

use App\Dtos\IdeaDto;
use App\Models\Idea;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class IdeaRepository implements IdeaRepositoryInterface
{

    public function modelQuery(): Builder|Idea
    {
        return Idea::query();
    }

    public function findById(int $id): ?Idea
    {
        return $this->modelQuery()
            ->select([
                'ideas.*',
                'users.id as user_id',
                'users.name as user_name'
            ])
            ->join('users', 'users.id', '=', 'ideas.user_id')
            ->where('ideas.id', $id)
            ->with(['comments','comments.user'])
            ->first();
    }

    public function searchIdeas(string|null $searchQuery): LengthAwarePaginator
    {
        $query = $this->modelQuery()
            ->select([
                'ideas.*',
                'users.id as user_id',
                'users.name as user_name'
            ])
            ->join('users', 'users.id', '=', 'ideas.user_id')
            ->with(['comments','comments.user'])
            ->orderBy('created_at', 'desc');
        $searchQuery= is_null($searchQuery) ?  $searchQuery : null;
        return $query->when($searchQuery != null, function ($query) use ($searchQuery) {
            return $query->where('content', 'like', '%' . $searchQuery . '%');

        })->paginate(5);
    }

    public function createIdea(IdeaDto $ideaDto): Builder|Idea
    {
        return $this->modelQuery()->create([
            'content' => $ideaDto->getContent(),
            'user_id' => $ideaDto->getUserId(),
        ]);
    }

    public function updateIdea(Idea $idea): Builder|Idea
    {
        $idea->save();
        return $idea;
    }

    public function deleteIdea(Idea $idea): bool
    {
        return $idea->delete();
    }
}

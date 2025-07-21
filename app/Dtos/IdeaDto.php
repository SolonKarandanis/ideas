<?php

namespace App\Dtos;

use App\Models\Idea;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class IdeaDto
{
    private ?int $id;

    private ?int $userId;
    private string $content;
    private ?int $likes;
    private ?Carbon $created_at;
    private ?Carbon $updated_at;

    public static function fromFormRequest(FormRequest $request):IdeaDto
    {
        $ideaDto = new IdeaDto();
        $ideaDto->setContent($request->get('content'));
        $ideaDto->setLikes($request->get('likes'));
        $ideaDto->setCreatedAt($request->get('created_at'));
        $ideaDto->setUpdatedAt($request->get('updated_at'));
        return $ideaDto;
    }

    public static function fromModel(Idea|Model $model):IdeaDto
    {
        $ideaDto = new IdeaDto();
        $ideaDto->setId($model->id);
        $ideaDto->setUserId($model->user_id);
        $ideaDto->setContent($model->content);
        $ideaDto->setLikes($model->likes);
        $ideaDto->setCreatedAt($model->created_at);
        $ideaDto->setUpdatedAt($model->updated_at);
        return $ideaDto;
    }

    public static function toArray(Idea|Model $model):array
    {
        return [
            'id' => $model->id,
            'content' => $model->content,
            'likes' => $model->likes,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getLikes(): ?int
    {
        return $this->likes;
    }

    public function setLikes(?int $likes): void
    {
        $this->likes = $likes;
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->created_at;
    }

    public function setCreatedAt(?Carbon $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?Carbon $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): void
    {
        $this->userId = $userId;
    }
}

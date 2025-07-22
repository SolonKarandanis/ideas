<?php

namespace App\Dtos;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentDto
{
    private ?int $userId;
    private ?int $ideaId;

    private string $content;

    public static function fromFormRequest(FormRequest $request):CreateCommentDto
    {
        $dto = new CreateCommentDto();
        $dto->setContent($request->get('content'));
        return $dto;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): void
    {
        $this->userId = $userId;
    }

    public function getIdeaId(): ?int
    {
        return $this->ideaId;
    }

    public function setIdeaId(?int $ideaId): void
    {
        $this->ideaId = $ideaId;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}

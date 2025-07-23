<?php

namespace App\Dtos;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserDto
{
    private ?int $id;
    private string $email;
    private string $name;
    private string $bio;

    public static function fromFormRequest(FormRequest $request):UpdateUserDto{
        $userDto = new UpdateUserDto();
        $userDto->setName($request->input('name'));
        $userDto->setEmail($request->input('email'));
        $userDto->setBio($request->input('bio'));
        return $userDto;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBio(): string
    {
        return $this->bio;
    }

    public function setBio(string $bio): void
    {
        $this->bio = $bio;
    }
}

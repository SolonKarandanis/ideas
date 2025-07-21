<?php

namespace App\Dtos;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class UserDto
{
    private ?int $id;
    private string $email;
    private string $name;
    private string $password;
    private string $bio;
    private ?Carbon $created_at;
    private ?Carbon $updated_at;

    public static function fromAPiFormRequest(FormRequest $request):UserDto{
        $userDto = new UserDto();
        $userDto->setName($request->input('name'));
        $userDto->setEmail($request->input('email'));
        $userDto->setPassword($request->input('password'));
        $userDto->setBio($request->input('bio'));
        return $userDto;
    }

    public static function fromModel(User|Model $model): UserDto{
        $userDto = new UserDto();
        $userDto->setId($model->id);
        $userDto->setName($model->name);
        $userDto->setEmail($model->email);
        $userDto->setPassword($model->password);
//        $userDto->setBio($model->bio);
        $userDto->setCreatedAt($model->created_at);
        $userDto->setUpdatedAt($model->updated_at);
        return $userDto;
    }

    public static function toArray(Model|User $model): array
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'email' => $model->email,
//            'bio' => $model->bio,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getBio(): string
    {
        return $this->bio;
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->updated_at;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setBio(string $bio): void
    {
        $this->bio = $bio;
    }

    public function setCreatedAt(?Carbon $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function setUpdatedAt(?Carbon $updated_at): void
    {
        $this->updated_at = $updated_at;
    }


}

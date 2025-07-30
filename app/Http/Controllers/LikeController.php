<?php

namespace App\Http\Controllers;

use App\Services\IdeaServiceInterface;

class LikeController extends Controller
{

    public function __construct(private readonly IdeaServiceInterface $ideaService,){}
    public function like(int $id)
    {
        $idea=$this->ideaService->findById($id,false);
        $liker= auth()->user();
        $liker->likes()->attach($idea);
        return redirect()->route('dashboard')
            ->with('success', 'Liked successfully');
    }

    public function unlike(int $id)
    {
        $idea=$this->ideaService->findById($id,false);
        $unLiker= auth()->user();
        $unLiker->likes()->detach($idea);
        return redirect()->route('dashboard')
            ->with('success', 'Unliked successfully');
    }
}

<?php

namespace App\Http\Controllers;


use App\Dtos\IdeaDto;
use App\Http\Requests\Ideas\CreateIdeaRequest;
use App\Http\Requests\Ideas\UpdateIdeaRequest;
use App\Services\IdeaServiceInterface;

class IdeaController extends Controller
{
    public function __construct(private readonly IdeaServiceInterface $ideaService){}

    public function store(CreateIdeaRequest $request)
    {
        $ideaDto = IdeaDto::fromFormRequest($request);
        $this->ideaService->createIdea($ideaDto);
        return redirect()->route('dashboard')
            ->with('success', 'Idea added successfully!');
    }

    public function show(int $id){
        $idea= $this->ideaService->findById($id,true);
        return view('ideas.show',[
            'idea'=>$idea,
            'editing'=>false
        ]);
    }

    public function edit(int $id){
        $idea= $this->ideaService->findById($id,true);
        return view('ideas.show',[
            'idea'=>$idea,
            'editing'=>true
        ]);
    }

    public function update(UpdateIdeaRequest $request, int $id){
        $ideaDto = IdeaDto::fromFormRequest($request);
        $ideaDto->setId($id);
        $this->ideaService->updateIdea($ideaDto);
        return redirect()->route('dashboard')->with('success', 'Idea updated successfully!');
    }

    public function destroy(int $id){
        $this->ideaService->deleteIdea($id);
        return redirect()->route('dashboard')
            ->with('success', 'Idea deleted successfully!');
    }
}

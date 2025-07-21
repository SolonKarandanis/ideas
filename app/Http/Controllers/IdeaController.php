<?php

namespace App\Http\Controllers;


use App\Http\Requests\Ideas\CreateIdeaRequest;
use App\Http\Requests\Ideas\UpdateIdeaRequest;
use App\Models\Idea;

class IdeaController extends Controller
{
    public function index()
    {

    }

    public function store(CreateIdeaRequest $request)
    {
        Idea::create([
            'content' => $request->get('content'),
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('dashboard')
            ->with('success', 'Idea added successfully!');
    }

    public function show(int $id){
        $idea= Idea::select([
            'ideas.*',
            'users.id as user_id',
            'users.name as user_name'
        ])
            ->join('users', 'users.id', '=', 'ideas.user_id')
            ->where('ideas.id', $id)
            ->with(['comments','comments.user'])
            ->first();
        return view('ideas.show',[
            'idea'=>$idea,
            'editing'=>false
        ]);
    }

    public function edit(int $id){
        $idea=Idea::whereId($id)->first();
        return view('ideas.show',[
            'idea'=>$idea,
            'editing'=>true
        ]);
    }

    public function update(UpdateIdeaRequest $request, int $id){
        $idea=Idea::whereId($id)->first();
        $idea->content = $request->get('content');
        $idea->save();
        return redirect()->route('dashboard')->with('success', 'Idea updated successfully!');
    }

    public function destroy(int $id){
        Idea::find($id)->delete();
        return redirect()->route('dashboard')
            ->with('success', 'Idea deleted successfully!');
    }
}

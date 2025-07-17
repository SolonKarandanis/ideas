<?php

namespace App\Http\Controllers;


use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required:string',
        ]);
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

    public function update(Request $request, int $id){
        $request->validate([
            'content' => 'required:string',
        ]);
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

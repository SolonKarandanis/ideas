<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request,int $id){
        request()->validate([
            'content' => 'required:string',
        ]);
        $idea=Idea::whereId($id)->first();
        if(is_null($idea)){
            abort(404);
        }
        Comment::create([
            'idea_id' => $idea->id,
            'content' => $request->get('content'),
        ]);
        return redirect()->route('dashboard')
            ->with('success', 'Comment added successfully!');
    }
}

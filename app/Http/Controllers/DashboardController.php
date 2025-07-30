<?php

namespace App\Http\Controllers;

use App\Services\IdeaServiceInterface;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function __construct(private readonly IdeaServiceInterface $ideaService){}
    public function index(Request $request)
    {
        $searchQuery=$request->has('search') ?  $request->get('search') : null;
        $ideas = $this->ideaService->searchIdeas($searchQuery);
//        dd($ideas);
        return view('dashboard', ['ideas' => $ideas]);
    }
}

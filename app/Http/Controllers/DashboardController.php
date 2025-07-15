<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Idea::query()->orderBy('created_at', 'desc');
        $searchQuery=$request->has('search') ?  $request->get('search') : null;
        $ideas=$query->when($searchQuery != null, function ($query) use ($searchQuery) {
            return $query->where('content', 'like', '%' . $searchQuery . '%');

        })
            ->paginate(5);
        return view('dashboard', ['ideas' => $ideas]);
    }
}

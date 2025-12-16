<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function ajax_load(Request $request)
    {
        $page = (int) $request->input('page', 1);
        $perPage = 18;

        $experts = Expert::with(['schedules', 'leaves'])
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get();

        // Render Blade partial
        $html = view('experts.cards', compact('experts'))->render();

        return response()->json([
            'html' => $html,
            'next_page' => $page + 1,
            'count' => $experts->count(),
        ]);
    }
}

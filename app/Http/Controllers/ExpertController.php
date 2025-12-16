<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function ajax_load(Request $request)
    {
        $experts = Expert::query()
            ->when(
                $request->search,
                fn($q) =>
                $q->where('name', 'like', '%' . $request->search . '%')
            )
            ->when(
                $request->sort === 'rating',
                fn($q) =>
                $q->orderByDesc('rating')
            )
            ->when(
                $request->sort === 'availability',
                fn($q) =>
                $q->orderBy('next_available_date')
            )
            ->paginate(6);

        return response()->json([
            'html' => view('experts.cards', compact('experts'))->render()
        ]);
    }

    public function schedule(Expert $expert)
    {
        $expert->load([
            'schedules',      // weekly schedules
            'leaves',         // leave dates (if separate)
        ]);
        return view('experts.expert-schedule', compact('expert'));
    }
}

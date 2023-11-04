<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Wrestler;
use App\ViewModels\GridViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class GridController extends Controller
{
    /**
     * Display the grid.
     */
    public function index(Request $request): InertiaResponse
    {
        $validated = $request->validate([
            // 'existingSelections' => ['array'],
        ]);
        $view_model = GridViewModel::make($validated);

        return Inertia::render('Grid', $view_model);
    }

    /**
     * Create a grid selection.
     */
    public function createSelection(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'selectedCellKey' => ['nullable', 'string'],
            'selectedCategorySlugs' => ['nullable', 'array'],
            'selectedCategorySlugs.*' => ['nullable', 'string'],
            'selectedWrestlerSlug' => ['nullable', 'string'],
            'existingSelections' => ['nullable', 'array'],
        ]);

        $view_model = GridViewModel::make($validated);

        return response()->json($view_model);
    }
}

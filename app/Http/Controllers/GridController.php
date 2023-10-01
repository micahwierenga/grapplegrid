<?php

namespace App\Http\Controllers;

use App\Models\Wrestler;
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
            'selectedCellKey' => ['string'],
            'selectedCategories' => ['array'],
            'selectedCategories.*' => ['string'],
            'selectedWrestlerSlug' => ['string'],
        ]);
        $categories = [
            'column_headers' => [
                'column_left' => [
                    'name' => '24/7 Title',
                    'slug' => '24/7-title',
                ],
                'column_middle' => [
                    'name' => '4 Horsemen',
                    'slug' => '4-horsemen',
                ],
                'column_right' => [
                    'name' => 'AEW International Championship',
                    'slug' => 'aew-international-championship',
                ],
            ],
            'row_headers' => [
                'row_top' => [
                    'name' => 'AEW World Heavyweight Championship',
                    'slug' => 'aew-world-heavyweight-championship',
                ],
                'row_middle' => [
                    'name' => 'AEW World Tag Team Championship',
                    'slug' => 'aew-world-tag-team-championship',
                ],
                'row_bottom' => [
                    'name' => 'AEW World Trios Championship',
                    'slug' => 'aew-world-trios-championship',
                ],
            ],
        ];
        $selections = [];
        $selections[$request->cellKey] = $request->selection;

        return Inertia::render('Grid', [
            'banner' => [
                'introText' => 'Announcement:',
                'mainText' => 'Play Now',
                'url' => '/play-now',
            ],
            'cells' => [
                [
                    'r1c1' => null,
                    'r1c2' => $categories['column_headers']['column_left']['name'],
                    'r1c3' => $categories['column_headers']['column_middle']['name'],
                    'r1c4' => $categories['column_headers']['column_right']['name'],
                ],
                [
                    'r2c1' => $categories['row_headers']['row_top']['name'],
                    'r2c2' => [
                        'selection' => $selections['r2c2'] ?? null,
                        'categories' => [$categories['row_headers']['row_top']['name'], $categories['column_headers']['column_left']['name']],
                    ],
                    'r2c3' => [
                        'selection' => $selections['r2c3'] ?? null,
                        'categories' => [$categories['row_headers']['row_top']['name'], $categories['column_headers']['column_middle']['name']],
                    ],
                    'r2c4' => [
                        'selection' => $selections['r2c4'] ?? null,
                        'categories' => [$categories['row_headers']['row_top']['name'], $categories['column_headers']['column_right']['name']],
                    ],
                ],
                [
                    'r3c1' => $categories['row_headers']['row_middle']['name'],
                    'r3c2' => [
                        'selection' => $selections['r3c2'] ?? null,
                        'categories' => [$categories['row_headers']['row_middle']['name'], $categories['column_headers']['column_left']['name']],
                    ],
                    'r3c3' => [
                        'selection' => $selections['r3c3'] ?? null,
                        'categories' => [$categories['row_headers']['row_middle']['name'], $categories['column_headers']['column_middle']['name']],
                    ],
                    'r3c4' => [
                        'selection' => $selections['r3c4'] ?? null,
                        'categories' => [$categories['row_headers']['row_middle']['name'], $categories['column_headers']['column_right']['name']],
                    ],
                ],
                [
                    'r4c1' => $categories['row_headers']['row_bottom']['name'],
                    'r4c2' => [
                        'selection' => $selections['r4c2'] ?? null,
                        'categories' => [$categories['row_headers']['row_bottom']['name'], $categories['column_headers']['column_left']['name']],
                    ],
                    'r4c3' => [
                        'selection' => $selections['r4c3'] ?? null,
                        'categories' => [$categories['row_headers']['row_bottom']['name'], $categories['column_headers']['column_middle']['name']],
                    ],
                    'r4c4' => [
                        'selection' => $selections['r4c4'] ?? null,
                        'categories' => [$categories['row_headers']['row_bottom']['name'], $categories['column_headers']['column_right']['name']],
                    ],
                ],
            ],
            'wrestlers' => Wrestler::all(),
        ]);
    }
}

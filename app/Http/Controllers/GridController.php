<?php

namespace App\Http\Controllers;

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
        $categories = [
            'column_headers' => ['CH 1', 'CH 2', 'CH 3'],
            'row_headers' => ['RH 1', 'RH 2', 'RH 3'],
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
                    'r1c2' => $categories['column_headers'][0],
                    'r1c3' => $categories['column_headers'][1],
                    'r1c4' => $categories['column_headers'][2],
                ],
                [
                    'r2c1' => $categories['row_headers'][0],
                    'r2c2' => [
                        'selection' => $selections['r2c2'] ?? null,
                        'categories' => [$categories['row_headers'][0], $categories['column_headers'][0]],
                    ],
                    'r2c3' => [
                        'selection' => $selections['r2c3'] ?? null,
                        'categories' => [$categories['row_headers'][0], $categories['column_headers'][1]],
                    ],
                    'r2c4' => [
                        'selection' => $selections['r2c4'] ?? null,
                        'categories' => [$categories['row_headers'][0], $categories['column_headers'][2]],
                    ],
                ],
                [
                    'r3c1' => $categories['row_headers'][1],
                    'r3c2' => [
                        'selection' => $selections['r3c2'] ?? null,
                        'categories' => [$categories['row_headers'][1], $categories['column_headers'][0]],
                    ],
                    'r3c3' => [
                        'selection' => $selections['r3c3'] ?? null,
                        'categories' => [$categories['row_headers'][1], $categories['column_headers'][1]],
                    ],
                    'r3c4' => [
                        'selection' => $selections['r3c4'] ?? null,
                        'categories' => [$categories['row_headers'][1], $categories['column_headers'][2]],
                    ],
                ],
                [
                    'r4c1' => $categories['row_headers'][2],
                    'r4c2' => [
                        'selection' => $selections['r4c2'] ?? null,
                        'categories' => [$categories['row_headers'][2], $categories['column_headers'][0]],
                    ],
                    'r4c3' => [
                        'selection' => $selections['r4c3'] ?? null,
                        'categories' => [$categories['row_headers'][2], $categories['column_headers'][1]],
                    ],
                    'r4c4' => [
                        'selection' => $selections['r4c4'] ?? null,
                        'categories' => [$categories['row_headers'][2], $categories['column_headers'][2]],
                    ],
                ],
            ],
        ]);
    }
}

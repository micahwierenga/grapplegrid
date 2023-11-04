<?php

namespace App\ViewModels;

use App\Models\Wrestler;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\WrestlerRepository;
use Illuminate\Support\Facades\App;

class GridViewModel
{
    public static function make(array $validatedRequest = [])
    {
        $wrestler_repository = App::make(WrestlerRepository::class);
        $category_repository = App::make(CategoryRepository::class);

        $selected_categories = $category_repository->getCategoriesBySlugs(['24/7-title', '4-horsemen', 'aew-international-championship', 'aew-world-heavyweight-championship', 'aew-world-tag-team-championship', 'aew-world-trios-championship']);
        $categories = [
            'column_headers' => [
                'column_left' => $selected_categories['aew-world-tag-team-championship'],
                'column_middle' => $selected_categories['4-horsemen'],
                'column_right' => $selected_categories['aew-international-championship'],
            ],
            'row_headers' => [
                'row_top' => $selected_categories['aew-world-heavyweight-championship'],
                'row_middle' => $selected_categories['24/7-title'],
                'row_bottom' => $selected_categories['aew-world-trios-championship'],
            ],
        ];

        $all_wrestlers = $wrestler_repository->getAllWrestlers();
        $all_wrestlers_by_slug = $all_wrestlers->keyBy('slug');

        $selections = [];
        if (
            isset($validatedRequest['existingSelections'])
            && count($validatedRequest['existingSelections']) > 0
        ) {
            foreach ($validatedRequest['existingSelections'] as $selection) {
                $all_wrestlers_by_slug[$selection['wrestlerSlug']]['already_used'] = true;
                $existing_wrestler = $all_wrestlers_by_slug[$selection['wrestlerSlug']];
                $existing_categories_intersected = array_intersect($selection['categorySlugs'], $existing_wrestler->categories->keyBy('slug')->keys()->all());
                $selections[$selection['cellKey']] = [
                    'name' => $existing_wrestler['name'],
                    'is_correct' => count($existing_categories_intersected) > 0,
                ];
            }
        }
        if (
            isset($validatedRequest['selectedWrestlerSlug'])
            && isset($validatedRequest['selectedCellKey'])
            && isset($validatedRequest['selectedCategorySlugs'])
            && count($validatedRequest['selectedCategorySlugs']) > 0
        ) {
            $all_wrestlers_by_slug[$validatedRequest['selectedWrestlerSlug']]['already_used'] = true;
            $selected_wrestler = $all_wrestlers_by_slug[$validatedRequest['selectedWrestlerSlug']] ?? null;

            $selected_categories_intersected = array_intersect($validatedRequest['selectedCategorySlugs'], $selected_wrestler->categories->keyBy('slug')->keys()->all());
            $selections[$validatedRequest['selectedCellKey']] = [
                'name' => $selected_wrestler['name'],
                'is_correct' => count($selected_categories_intersected) > 0,
            ];
        }

        return [
            'banner' => [
                'introText' => 'Announcement:',
                'mainText' => 'Play Now',
                'url' => '/play-now',
            ],
            'cells' => [
                [
                    'r1c1' => [
                        'is_header' => true,
                        'category_name' => '',
                    ],
                    'r1c2' => [
                        'is_header' => true,
                        'category_name' => $categories['column_headers']['column_left']['name'],
                    ],
                    'r1c3' => [
                        'is_header' => true,
                        'category_name' => $categories['column_headers']['column_middle']['name'],
                    ],
                    'r1c4' => [
                        'is_header' => true,
                        'category_name' => $categories['column_headers']['column_right']['name'],
                    ],
                ],
                [
                    'r2c1' => [
                        'is_header' => true,
                        'category_name' => $categories['row_headers']['row_top']['name'],
                    ],
                    'r2c2' => [
                        'is_header' => false,
                        'selection' => [
                            'name' => $selections['r2c2']['name'] ?? null,
                            'is_correct' => $selections['r2c2']['is_correct'] ?? null,
                        ],
                        'category_slugs' => [$categories['row_headers']['row_top']['slug'], $categories['column_headers']['column_left']['slug']],
                    ],
                    'r2c3' => [
                        'is_header' => false,
                        'selection' => [
                            'name' => $selections['r2c3']['name'] ?? null,
                            'is_correct' => $selections['r2c3']['is_correct'] ?? null,
                        ],
                        'category_slugs' => [$categories['row_headers']['row_top']['slug'], $categories['column_headers']['column_middle']['slug']],
                    ],
                    'r2c4' => [
                        'is_header' => false,
                        'selection' => [
                            'name' => $selections['r2c4']['name'] ?? null,
                            'is_correct' => $selections['r2c4']['is_correct'] ?? null,
                        ],
                        'category_slugs' => [$categories['row_headers']['row_top']['slug'], $categories['column_headers']['column_right']['slug']],
                    ],
                ],
                [
                    'r3c1' => [
                        'is_header' => true,
                        'category_name' => $categories['row_headers']['row_middle']['name'],
                    ],
                    'r3c2' => [
                        'is_header' => false,
                        'selection' => [
                            'name' => $selections['r3c2']['name'] ?? null,
                            'is_correct' => $selections['r3c2']['is_correct'] ?? null,
                        ],
                        'category_slugs' => [$categories['row_headers']['row_middle']['slug'], $categories['column_headers']['column_left']['slug']],
                    ],
                    'r3c3' => [
                        'is_header' => false,
                        'selection' => [
                            'name' => $selections['r3c3']['name'] ?? null,
                            'is_correct' => $selections['r3c3']['is_correct'] ?? null,
                        ],
                        'category_slugs' => [$categories['row_headers']['row_middle']['slug'], $categories['column_headers']['column_middle']['slug']],
                    ],
                    'r3c4' => [
                        'is_header' => false,
                        'selection' => [
                            'name' => $selections['r3c4']['name'] ?? null,
                            'is_correct' => $selections['r3c4']['is_correct'] ?? null,
                        ],
                        'category_slugs' => [$categories['row_headers']['row_middle']['slug'], $categories['column_headers']['column_right']['slug']],
                    ],
                ],
                [
                    'r4c1' => [
                        'is_header' => true,
                        'category_name' => $categories['row_headers']['row_bottom']['name'],
                    ],
                    'r4c2' => [
                        'is_header' => false,
                        'selection' => [
                            'name' => $selections['r4c2']['name'] ?? null,
                            'is_correct' => $selections['r4c2']['is_correct'] ?? null,
                        ],
                        'category_slugs' => [$categories['row_headers']['row_bottom']['slug'], $categories['column_headers']['column_left']['slug']],
                    ],
                    'r4c3' => [
                        'is_header' => false,
                        'selection' => [
                            'name' => $selections['r4c3']['name'] ?? null,
                            'is_correct' => $selections['r4c3']['is_correct'] ?? null,
                        ],
                        'category_slugs' => [$categories['row_headers']['row_bottom']['slug'], $categories['column_headers']['column_middle']['slug']],
                    ],
                    'r4c4' => [
                        'is_header' => false,
                        'selection' => [
                            'name' => $selections['r4c4']['name'] ?? null,
                            'is_correct' => $selections['r4c4']['is_correct'] ?? null,
                        ],
                        'category_slugs' => [$categories['row_headers']['row_bottom']['slug'], $categories['column_headers']['column_right']['slug']],
                    ],
                ],
            ],
            'wrestlers' => $all_wrestlers,
        ];
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Wrestler;
use Illuminate\Console\Command;
use Iterator;
use League\Csv\Reader;

class ProcessGrappleGridSpreadsheet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:process-grapple-grid-spreadsheet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process a Grapple Grid spreadsheet';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $csv = Reader::createFromPath(base_path() . '/grapple_grid.csv', 'r');
        $csv->setHeaderOffset(0);

        $headers = $csv->getHeader();
        $this->createCategories($headers);

        $records = $csv->getRecords($headers);
        $prepared_records = $this->prepareRecords($records);

        $this->createWrestlers($prepared_records);
    }

    private function createCategories(array $headers): void
    {
        foreach ($headers as $header) {
            if (!in_array(strtolower($header), ['id', 'wrestler'])) {
                Category::firstOrCreate([
                    'name' => $header,
                ]);
            }
        }
    }

    private function createWrestlers(array $prepared_records): void
    {
        $categories = Category::all()->keyBy('name');

        foreach ($prepared_records as $wrestler_key => $prepared_record) {
            $wrestler = Wrestler::firstOrCreate([
                'name' => $wrestler_key,
            ]);
            foreach ($prepared_record as $category_key => $value) {
                // Create row in pivot table
                $wrestler->categories()->attach($categories[$category_key]);
            }
        }
    }

    private function prepareRecords(Iterator $records): array
    {
        $prepared_records = [];

        foreach ($records as $record) {
            $wrestler = $record['Wrestler'];
            unset($record['ID'], $record['Wrestler']);
            // Filter out null columns
            $record = array_filter($record);
            $prepared_records[$wrestler] = $record;
        }

        return $prepared_records;
    }
}

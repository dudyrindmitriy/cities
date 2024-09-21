<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ParseCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:cities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse cities from the api.hh.ru';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = 'https://api.hh.ru/areas';
        $response = Http::get($url);
        $countries = $response->json();
        foreach ($countries as $country) {
            if ($country['name'] == 'Россия') {
                $this->importAreas($country['areas']);
            }
        }

        $this->info('Города успешно импортированы!');
    }
    private function importAreas($areas)
    {
        foreach ($areas as $area) {
            DB::table('cities')->updateOrInsert([
                'name' => $area['name'],
                'slug' => strtolower(str_replace(' ', '_', $area['name'])), // Превращаем имя в slug
            ]);

            // Проверяем, есть ли под районы и рекурсивно вызываем метод
            if (isset($area['areas']) && count($area['areas']) > 0) {
                $this->importAreas($area['areas']);
            }
        }
    }
}

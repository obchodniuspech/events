<?php

namespace Database\Seeders;

use App\Models\EventsCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventsCategories::create([
            'name' => 'Testovací kategorie',
            'description' => 'Testovací popis',
            'url' => 'testovaci-kategorie',
            'status' => 1,
        ]);

        EventsCategories::create([
            'name' => 'Testovací kategorie neaktivní',
            'description' => 'Testovací popis',
            'url' => 'testovaci-kategorie-neaktivni',
            'status' => 0,
        ]);

    }
}

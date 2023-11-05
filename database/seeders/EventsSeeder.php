<?php

namespace Database\Seeders;


use App\Models\Events;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Events::create([
            'name' => 'Test akce',
            'description' => 'Test popis',
            'starts' => '2023-11-17T10:00:00',
            'ends' => '2023-11-17T12:00:00',
            'where' => 'Václavské náměstí',
        ]);

    }
}

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
            'description' => 'Test popis'
        ]);

    }
}

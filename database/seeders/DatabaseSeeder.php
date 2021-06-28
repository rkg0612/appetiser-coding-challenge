<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'start_date' => now()->firstOfMonth()->format('Y-m-d'),
            'end_date' => now()->lastOfMonth()->format('Y-m-d'),
            'days_of_week' => serialize([])
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pages')->insert(
            [
                ['name' => 'About', 'created_at' => Carbon::now()],
                ['name' => 'Show', 'created_at' => Carbon::now()],
                ['name' => 'Books', 'created_at' => Carbon::now()],
                ['name' => 'Cards', 'created_at' => Carbon::now()],
                ['name' => 'Contact', 'created_at' => Carbon::now()],
                ['name' => 'Home', 'created_at' => Carbon::now()],
                ['name' => 'Service', 'created_at' => Carbon::now()],
            ]
        );
    }
}

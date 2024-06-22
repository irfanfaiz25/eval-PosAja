<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Question::factory()->count(5)->create();

        DB::table('scores')->insert([
            'name' => 'ss',
        ]);

        DB::table('scores')->insert([
            'name' => 's',
        ]);

        DB::table('scores')->insert([
            'name' => 'ks',
        ]);

        DB::table('scores')->insert([
            'name' => 'ts',
        ]);
    }
}

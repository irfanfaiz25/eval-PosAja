<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            'created_at' => now()
        ]);

        DB::table('scores')->insert([
            'name' => 's',
            'created_at' => now()
        ]);

        DB::table('scores')->insert([
            'name' => 'ks',
            'created_at' => now()
        ]);

        DB::table('scores')->insert([
            'name' => 'ts',
            'created_at' => now()
        ]);

        DB::table('variables')->insert([
            'name' => 'Accessible',
            'created_at' => now()
        ]);

        DB::table('variables')->insert([
            'name' => 'Findable',
            'created_at' => now()
        ]);

        DB::table('variables')->insert([
            'name' => 'Usable',
            'created_at' => now()
        ]);

        DB::table('variables')->insert([
            'name' => 'Useful',
            'created_at' => now()
        ]);

        DB::table('variables')->insert([
            'name' => 'Valueable',
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

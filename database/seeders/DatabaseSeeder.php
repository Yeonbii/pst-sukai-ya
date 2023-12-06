<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Part;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'  => 'Admin',
            'username'  => 'admin',
            'password' => bcrypt('123'),
            'email' => 'admin@gmail.com',
            'no_wa' => '081234123412',
            'no_telp' => '081234123412'
        ]);

        Part::create([
            'name' => 'Bagian Identitas',
            'code' => 'i'
            // i --> identity
        ]);
        
        Part::create([
            'name' => 'Bagian Layanan',
            'code' => 's'
            // s --> service
        ]);

        Part::create([
            'name' => 'Bagian Nilai Pelayanan',
            'code' => 'sv'
            // sv --> service value
        ]);

        Part::create([
            'name' => 'Bagian Rating Pelayanan',
            'code' => 'sr'
            // sr --> service rating
        ]);

        Part::create([
            'name' => 'Bagian Feedback',
            'code' => 'f'
            // f --> feedback
        ]);

        Part::create([
            'name' => 'Bagian Lain-lain',
            'code' => 'o'
            // o --> other
        ]);

    }
}

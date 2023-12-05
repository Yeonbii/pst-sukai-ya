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
            'slug' => 'identity'
        ]);
        
        Part::create([
            'name' => 'Bagian Layanan',
            'slug' => 'service'
        ]);

        Part::create([
            'name' => 'Bagian Nilai Pelayanan',
            'slug' => 'service-value'
        ]);

        Part::create([
            'name' => 'Bagian Rating Pelayanan',
            'slug' => 'service-rating'
        ]);

        Part::create([
            'name' => 'Bagian Feedback',
            'slug' => 'feedback'
        ]);

        Part::create([
            'name' => 'Bagian Lain-lain',
            'slug' => 'other'
        ]);

    }
}

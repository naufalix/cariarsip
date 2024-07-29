<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Rack;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        User::create([
            "name" => "Admin Arsip",  
            "username" => "admin",  
            "password" => bcrypt('password'),
            "role" => "admin",  
        ]);

        Rack::create(["name" => "Rak 1"]);
        Rack::create(["name" => "Rak 2"]);
        Rack::create(["name" => "Rak 3"]);
        
        Book::create(["name" => "Buku 1","rack_id" => 1,"code" => 1001]);
        Book::create(["name" => "Buku 2","rack_id" => 2,"code" => 1002]);
        Book::create(["name" => "Buku 3","rack_id" => 3,"code" => 1003]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
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

        Category::create(["name" => "Arsip"]);
        Category::create(["name" => "Buku"]);
        
        Rack::create(["name" => "Rak 1"]);
        Rack::create(["name" => "Rak 2"]);
        Rack::create(["name" => "Rak 3"]);
        
        Book::create(["title" => "Buku 1", "category_id" => 1, "rack_id" => 1, "year"=>2024, "ordner" => 1001, "recap"=>""]);
        Book::create(["title" => "Buku 2", "category_id" => 2, "rack_id" => 2, "year"=>2024, "ordner" => 1002, "recap"=>""]);
        Book::create(["title" => "Buku 3", "category_id" => 1, "rack_id" => 3, "year"=>2024, "ordner" => 1003, "recap"=>""]);
    }
}

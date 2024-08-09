<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use App\Models\Rack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDashboard extends Controller
{
    
    public function index(){
        return view('admin.dashboard',[
            "title" => "Admin Dashboard",
            "books" => Book::all(),
            "categories" => Category::all(),
            "racks" => Rack::all(),
        ]);
    }

}

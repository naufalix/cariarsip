<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Category;
use App\Models\Book;
use App\Models\Rack;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{

  public function Category(Category $category){  
    return ApiFormatter::createApi(200,"Success",$category);
  }
  public function Book(Book $book){  
    return ApiFormatter::createApi(200,"Success",$book);
  }
  public function Rack(Rack $rack){  
    return ApiFormatter::createApi(200,"Success",$rack);
  }
  public function User(User $user){  
    return ApiFormatter::createApi(200,"Success",$user);
  }

}

<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Rack;;

class HomeController extends Controller
{
    private function meta(){
        $meta = Meta::$data_meta;
        $meta['title'] = 'Pekan Elektromedik Nasional';
        $meta['description'] = 'PENA atau Pekan Elektromedik Nasional merupakan agenda tahunan Himpunan Mahasiswa Teknik Elektromedik seIndonesia (HIMATEMI) dimana didalamnya terdapat dua kegiatan inti yaitu Electromedical Innovation Competition (EIC) dan Seminar Nasional (SEMNAS).';
        return $meta;
    }

    public function index(){
        return view('home',[
            "title" => "Cari Arsip | Homepage",
            "books" => Book::orderBy('updated_at', 'DESC')->get(),
            "categories" => Category::orderBy('name', 'ASC')->get()
        ]);
    }

    public function eic(){
        return view('eic',[
            "meta" => $this->meta(),
            "cards" => Card::whereShow(1)->orderBy("sort")->get(),
            "categories" => EicCategory::whereStatus(1)->get(),
            "contents" => Content::all(),
            "galleries" => Gallery::whereType(1)->orderBy("sort")->get(),
            "sponsors" => Sponsor::orderBy("sort")->get(),
        ]);
    }

    public function semnas(){
        return view('semnas',[
            "meta" => $this->meta(),
            "contents" => Content::all(),
            "galleries" => Gallery::whereType(1)->orderBy("sort")->get(),
            "sponsors" => Sponsor::orderBy("sort")->get(),
        ]);
    }
}

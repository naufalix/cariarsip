<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Rack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminBook extends Controller
{
    
    public function index(){
        if(auth()->user()->role=="admin"){
            return view('admin.book',[
                "title" => "Manage Arsip",
                "books" => Book::all(),
                "racks" => Rack::all(),
            ]);
        }else{
            return redirect('/admin/dashboard')->with("info","Anda tidak memiliki akses");
        }
    }

    public function postHandler(Request $request){
        if($request->submit=="store"){
            $res = $this->store($request);
            return redirect('/admin/book')->with($res['status'],$res['message']);
        }
        if($request->submit=="update"){
            $res = $this->update($request);
            return redirect('/admin/book')->with($res['status'],$res['message']);
        }
        if($request->submit=="destroy"){
            $res = $this->destroy($request);
            return redirect('/admin/book')->with($res['status'],$res['message']);
            // return redirect('/admin/book')->with("info","Fitur hapus sementara dinonaktifkan");
        }else{
            return redirect('/admin/book')->with("info","Submit not found");
        }
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'rack_id' => 'required|numeric',
            'name' => 'required',
            'code' => 'required|numeric'
        ]);

        $book = Book::whereCode($request->code)->first();

        // Check book code
        if(!$book){
            // Create new book
            Book::create($validatedData);
            return ['status'=>'success','message'=>'Arsip berhasil ditambahkan'];
        }else{
            return ['status'=>'error','message'=>'Kode telah terpakai'];
        }

    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'id' => 'required|numeric',
            'rack_id' => 'required|numeric',
            'name' => 'required',
            'code' => 'required|numeric'
        ]);

        $book = Book::find($request->id);
        $oldCode = $book->code;
        $newCode = $request->code;


        //Check if the book is found
        if($book){
            //Check code
            if($newCode!=$oldCode){
                if(Book::whereCode($request->code)->first()){
                    return ['status'=>'error','message'=>'Code telah terpakai'];
                }
                // Update book
                $book->update($validatedData);   
                return ['status'=>'success','message'=>'Arsip berhasil diedit.']; 
            }
            // Update book
            $book->update($validatedData);   
            return ['status'=>'success','message'=>'Arsip berhasil diedit']; 
        }else{
            return ['status'=>'error','message'=>'Arsip tidak ditemukan'];
        }
    }

    public function destroy(Request $request){
        
        $validatedData = $request->validate([
            'id'=>'required|numeric',
        ]);

        $book = Book::find($request->id);

        //Check if book is found
        if($book){
            Book::destroy($request->id);    // Delete Book
            return ['status'=>'success','message'=>'Arsip berhasil dihapus'];
        }else{
            return ['status'=>'error','message'=>'Arsip tidak ditemukan'];
        }
    }
}

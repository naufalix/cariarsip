<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminCategory extends Controller
{
    
    public function index(){
        if(auth()->user()->role=="admin"){
            return view('admin.category',[
                "title" => "Manage Kategori",
                "categories" => category::all()
            ]);
        }else{
            return redirect('/admin/dashboard')->with("info","Anda tidak memiliki akses");
        }
    }

    public function postHandler(Request $request){
        if($request->submit=="store"){
            $res = $this->store($request);
            return redirect('/admin/category')->with($res['status'],$res['message']);
        }
        if($request->submit=="update"){
            $res = $this->update($request);
            return redirect('/admin/category')->with($res['status'],$res['message']);
        }
        if($request->submit=="destroy"){
            $res = $this->destroy($request);
            return redirect('/admin/category')->with($res['status'],$res['message']);
            // return redirect('/admin/category')->with("info","Fitur hapus sementara dinonaktifkan");
        }else{
            return redirect('/admin/category')->with("info","Submit not found");
        }
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        // Create new category
        category::create($validatedData);
        return ['status'=>'success','message'=>'Kategori berhasil ditambahkan'];
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'id' => 'required|numeric',
            'name' => 'required',
        ]);

        $category = category::find($request->id);
        
        //Check if the category is found
        if($category){
            // Update category
            $category->update($validatedData);   
            return ['status'=>'success','message'=>'Kategori berhasil diedit']; 
        }else{
            return ['status'=>'error','message'=>'Kategori tidak ditemukan'];
        }
    }

    public function destroy(Request $request){
        
        $validatedData = $request->validate([
            'id'=>'required|numeric',
        ]);

        $category = category::find($request->id);
        $name = $category->name;
        $bookcount = $category->book()->count();

        //Check if category is found
        if($category){
            //Check if category empty
            if($bookcount==0){
                category::destroy($request->id);    // Delete category
                return ['status'=>'success','message'=> $name.' berhasil dihapus'];
            }else{
                return ['status'=>'info','message'=>'Masih ada arsip didalam Kategori'];
            }
        }else{
            return ['status'=>'error','message'=>'Kategori tidak ditemukan'];
        }
    }
}

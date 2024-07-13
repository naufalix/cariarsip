<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Rack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRack extends Controller
{
    
    public function index(){
        if(auth()->user()->role=="admin"){
            return view('admin.rack',[
                "title" => "Manage Rak",
                "racks" => rack::all(),
                "racks" => Rack::all(),
            ]);
        }else{
            return redirect('/admin/dashboard')->with("info","Anda tidak memiliki akses");
        }
    }

    public function postHandler(Request $request){
        if($request->submit=="store"){
            $res = $this->store($request);
            return redirect('/admin/rack')->with($res['status'],$res['message']);
        }
        if($request->submit=="update"){
            $res = $this->update($request);
            return redirect('/admin/rack')->with($res['status'],$res['message']);
        }
        if($request->submit=="destroy"){
            $res = $this->destroy($request);
            return redirect('/admin/rack')->with($res['status'],$res['message']);
            // return redirect('/admin/rack')->with("info","Fitur hapus sementara dinonaktifkan");
        }else{
            return redirect('/admin/rack')->with("info","Submit not found");
        }
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        // Create new rack
        Rack::create($validatedData);
        return ['status'=>'success','message'=>'Rak berhasil ditambahkan'];
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'id' => 'required|numeric',
            'name' => 'required',
        ]);

        $rack = Rack::find($request->id);
        
        //Check if the rack is found
        if($rack){
            // Update rack
            $rack->update($validatedData);   
            return ['status'=>'success','message'=>'Rak berhasil diedit']; 
        }else{
            return ['status'=>'error','message'=>'Rak tidak ditemukan'];
        }
    }

    public function destroy(Request $request){
        
        $validatedData = $request->validate([
            'id'=>'required|numeric',
        ]);

        $rack = Rack::find($request->id);
        $name = $rack->name;
        $bookcount = $rack->book()->count();

        //Check if rack is found
        if($rack){
            //Check if rack empty
            if($bookcount==0){
                Rack::destroy($request->id);    // Delete rack
                return ['status'=>'success','message'=> $name.' berhasil dihapus'];
            }else{
                return ['status'=>'info','message'=>'Masih ada arsip didalam rak'];
            }
        }else{
            return ['status'=>'error','message'=>'Rak tidak ditemukan'];
        }
    }
}

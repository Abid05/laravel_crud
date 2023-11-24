<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //index method for showing data
    public function index(){

        $data =  Product::all();
        return view('admin.product.index',compact('data'));
    }
    
    //store methode
    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|unique:products|max:55',
            
        ]);

       Product::insert([
            'name'=>$request->name,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
       ]);
       $notifiaction =['messege'=>'Product Inserted!','alert-type'=>'success'];
        return redirect()->back()->with($notifiaction);

    }

    //delete methode
    public function delete($id){
        $product = Product::find($id);
        $product->delete(); 
        
        $notifiaction =['messege'=>'Product Deleted!','alert-type'=>'success'];
        return redirect()->back()->with($notifiaction);
    }

    //Edit methode
    public function edit($id){
        $data =Product::find($id);
        return view('admin.product.edit',compact('data')); 
        
    }

    //Update methode
    public function update(Request $request){
        $id = $request->id;
        Product::where('id', '=', $id)->update([
            'name'=>$request->name,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
       
    ]);

        $notifiaction =['messege'=>'Product Updated!','alert-type'=>'success'];
        return redirect()->back()->with($notifiaction);
    }
}

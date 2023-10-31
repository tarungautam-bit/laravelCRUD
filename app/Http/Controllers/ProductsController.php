<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ProductsController extends Controller
{
    public function index(){
        $products=Products::latest()->paginate(5);
        return view('products.index',['products'=>$products]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        //Validate
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,|max:5000',
        ]);

        $imagename=time().".".$request->image->extension();
        $request->image->move(public_path('products'),$imagename);

        $products= new Products;
        $products->name=$request->name;
        $products->description=$request->description;
        $products->image=$imagename;
        $products->save();
        
        return back()->withSuccess('Product Added Successfully');
    }
    public function edit($id){
        $product=Products::where('id',$id)->first();

        return view('products.edit',['product'=>$product]);
    }

    public function update(Request $request,$id){
        $product=Products::where('id',$id)->first();
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png|max:5000'
        ]);

        if(isset($request->image)){
            $imagename=time().".".$request->image->extension();
            $request->image->move(public_path('products'),$imagename);
            $product->image=$imagename;
        }
        $product->name=$request->name;
        $product->description=$request->description;

        if($product->save()){
            return back()->withSuccess('Product Updated Successfully');
        }else{
            return back()->withError('Product Update Unsuccessful');
        }
    }

    public function delete($id){
        $product=Products::where('id',$id)->first();
        if($product->delete()){
            return back()->withSuccess('Product Delete Successfully');
        }else{
            return back()->withError('Product Delete Unsuccessful');
        }
    }

    public function show($id){
        $product=Products::where('id',$id)->first();
        return view('products.show',['product'=>$product]);
    }
}


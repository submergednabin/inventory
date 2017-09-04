<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Unit;
use Auth;
use Validator;

class ProductController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    public function index(){
    	$products = Product::all();
    	return view('inventory.products.index',compact('products'));
    }

    public function create(){
    	$categories = ProductCategory::orderBy('category_name','ASC')->pluck('category_name','id');
    	$units = Unit::orderBy('unit_name','ASC')->pluck('unit_name','id');
    	return view('inventory.products.create',compact('categories','units'));
    }

    public function store(Request $request){
    	$rules = [
    		'item_name'=>'required',
    		'sku'=>'required|unique:products',
    		'image'=>'mimes:png,jpeg,jpg',
    		'unit_id'=>'required',
    		'cost_price'=>'required',
    		'selling_price'=>'required',
    	];
    	$message = [
    		'item_name.required'=>'The Product Item Name is required',
    		'category_id.required'=>'Please select any one category',
    		'vendor_id.required'=>'Please select any one vendor',
    		'unit_id.required'=>'Please select any one unit',
    		'cost_price.required'=>'The cost price is required',
    		'selling_price.required'=>'The selling price is required',
    	];

    	$validate = Validator::make($request->all(),$rules,$message);
    	if($validate->fails()){
    		return redirect('admin/product/create')
    			->withErrors($validate)
    			->withInput();
    	}else{
    		$input = $request->all();
    		$input['category_id']= $request->category_id?$request->category_id:null;
    		$input['unit_id']= $request->unit_id?$request->unit_id:null;
    		if($request->hasFile('image')){
	            $destinationPath = 'image/productItemImage';
	            $file = $request->file('image');
	            $file->move($destinationPath,$file->getClientOriginalName());
	            $input['image'] = $request->image?'image/productItemImage/'.$file->getClientOriginalName():Null;
            }
            $saveProduct = Product::create($input);
            session()->flash('message','The product has been saved.');
            return redirect('admin/product');
    	}
    }

    public function edit($id){
    	$product = Product::find($id);
    	$categories = ProductCategory::orderBy('category_name','ASC')->pluck('category_name','id');
    	$units = Unit::orderBy('unit_name','ASC')->pluck('unit_name','id');
    	return view('inventory.products.edit',compact('product','categories','units'));
    }

    public function update(Request $request, $id){
    	$rules = [
    		'item_name'=>'required',
    		'sku'=>'required',
    		'image'=>'mimes:png,jpeg,jpg',
    		'unit_id'=>'required',
    		'cost_price'=>'required',
    		'selling_price'=>'required',
    	];
    	$message = [
    		'item_name.required'=>'The Product Item Name is required',
    		'category_id.required'=>'Please select any one category',
    		'vendor_id.required'=>'Please select any one vendor',
    		'unit_id.required'=>'Please select any one unit',
    		'cost_price.required'=>'The cost price is required',
    		'selling_price.required'=>'The selling price is required',
    	];

    	$validate = Validator::make($request->all(),$rules,$message);
    	if($validate->fails()){
    		return redirect('admin/product/'.$id.'/edit')
    			->withErrors($validate)
    			->withInput();
    	}else{
    		$product = Product::find($id);
    		$input = $request->all();
    		$input['category_id']= $request->category_id?$request->category_id:null;
    		$input['unit_id']= $request->unit_id?$request->unit_id:null;
    		if($request->hasFile('image')){
	            $destinationPath = 'image/productItemImage';
	            $file = $request->file('image');
	            $file->move($destinationPath,$file->getClientOriginalName());
	            $input['image'] = $request->image?'image/productItemImage/'.$file->getClientOriginalName():Null;
            }
            $updateProduct = $product->update($input);
            session()->flash('message','The product is updated.');
            return redirect('admin/product');
    	}
    }

    public function destroy(Request $request,$id){
    	if(!$request->ajax()){
    		return false;
    	}
    	$product = Product::find($id)->delete();
    	session()->flash('message','The product is deleted.');
    	return response()->json([
    		'status'=>'success',
    		'url'=>url('admin/product'),
    	]);
    }
}

<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Auth;
use Validator;

class ProductCategoryController extends Controller
{
    public function __construct(){
    	
    	$this->middleware('admin');

    }

    public function index(){
    	$productCategories = ProductCategory::all();
    	return view('inventory.product-category.index',compact('productCategories'));
    }

    public function create(){
    	return view('inventory.product-category.create');
    }
    public function store(Request $request){
    	$rules = [
    		'category_name'=>'required',
    	];
    	$message = [
    		'category_name.required'=>'The Category Name is required',
    	];
    	$validate = Validator::make($request->all(),$rules,$message);
    	if($validate->fails()){
    		return redirect('admin/product-category/create')
    			->withErrors($validate)
    			->withInput();
    	}else{
    		$input = $request->all();
    		$save = ProductCategory::create($input);
    		session()->flash('message','The category is created.');
    		return redirect('admin/product-category');
    	}
    }

    public function edit($id){
    	$category = ProductCategory::find($id);
    	return view('inventory.product-category.edit',compact('category'));
    }

    public function update(Request $request,$id){
    	$rules = [
    		'category_name'=>'required',
    	];
    	$message = [
    		'category_name.required'=>'The category name is required.',
    	];
    	$validate = Validator::make($request->all(),$rules,$message);
    	if($validate->fails()){
    		return redirect('admin/product-category/'.$id.'/edit')
    			->withErrors($validate)
    			->withInput();
    	}else{
    		$category = ProductCategory::find($id);
    		$input = $request->all();
    		$udpateCat = $category->update($input);
    		session()->flash('message','The product category is updated.');
    		return redirect('admin/product-category'); 
    	}
    }

    public function destroy(Request $request,$id){
    	if(!$request->ajax()){
    		return false;
    	}
    	$category = ProductCategory::find($id);
    	$category->delete();
    	session()->flash('message','The product category is deleted.');
    	return response()->json([
    		'status'=>'success',
    		'url'=>url('admin/product-category'),
    	]);
    }
}

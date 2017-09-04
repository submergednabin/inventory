<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Auth;
use Validator;

class VendorController extends Controller
{
    public function __construnct(){
        
        // $this->middleware('admin');
    	
    }

    public function index(){
    	$vendors = Vendor::all();
    	return view('inventory.vendor.index',compact('vendors'));
    }

    public function create(){
    	return view('inventory.vendor.create');
    }

    public function store(Request $request){
    	$rules = [
    		'fullname'=>'required',
    		'phone'=>'required',
    	];
    	$validate = Validator::make($request->all(),$rules);
    	if($validate->fails()){
    		return redirect('admin/vendor/create')
    			->withErrors($validate)
    			->withInput();
    	}else{
    		$input = $request->all();
    		$save = Vendor::create($input);
    		session()->flash('message','The Vendor has been created.');
    		return redirect('admin/vendor/create');
    	}
    }

    public function edit($id){
    	$vendor = Vendor::find($id);
    	return view('inventory.vendor.edit',compact('vendor'));
    }

    public function update(Request $request, $id){
    	$rules = [
    		'fullname'=>'required',
    		'phone'=>'required',
    	];

    	$validate = Validator::make($request->all(),$rules);
    	if($validate->fails()){
    		return redirect('admin/vendor/'.$id.'/edit')
    			->withErrors($validate)
    			->withInput();
    	}else{
    		$input = $request->all();
    		$vendor = Vendor::find($id);
    		$vendor->update($input);
    		session()->flash('message','The Vendor has been updated.');
    		return redirect('admin/vendor');
    	}
    }

    public function destroy(Request $request,$id){
    	if(!$request->ajax()){
    		return false;
    	}
    	$vendor = Vendor::find($id);
    	$vendor->delete();
    	session()->flash('message','The vendor has been deleted.');
    	return response()->json([
    		'status'=>'success',
    		'url'=>url('admin/vendor'),
    	]);
    }



}

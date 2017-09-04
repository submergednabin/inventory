<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use Auth;
use Validator;

class UnitController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    public function index(){
    	$units = Unit::all();
    	return view('inventory.unit.index',compact('units'));
    }

    public function create(){
    	return view('inventory.unit.create');
    }

    public function store(Request $request){
    	$rules = [
    		'unit_name'=>'required',
    	];
    	$message = [
    		'unit_name.required'=>'The unit name is required.',
    	];
    	$validate = Validator::make($request->all(),$rules,$message);
    	if($validate->fails()){
    		return redirect('admin/unit/create')
    			->withErrors($validate)
    			->withInput();
    	}else{
    		$input = $request->all();
    		$save = Unit::create($input);
    		session()->flash('message','The unit name is created.');
    		return redirect('admin/unit');
    	}
    }

    public function edit($id){
    	$unit = Unit::find($id);
    	return view('inventory.unit.edit',compact('unit'));
    }

    public function update(Request $request,$id){
    	$rules = [
    		'unit_name'=>'required',
    	];
    	$message = [
    		'unit_name.required'=>'The unit name is required.',
    	];
    	$validate = Validator::make($request->all(),$rules,$message);
    	if($validate->fails()){
    		return redirect('admin/unit/'.$id.'/edit')
    			->withErrors($validate)
    			->withInput();
    	}else{
    		$unit = Unit::find($id);
    		$unit->update($input);
    		session()->flash('message','The unit is updated.');
    		return redirect('admin/unit');
    	}
    }

    public function destroy(Request $request,$id){
    	if(!$request->ajax()){
    		return false;
    	}
    	$unit = Unit::find($id);
    	$unit->delete();
    	session()->flash('message','The Unit is deleted');
    	return response()->json([
    		'status'=>'success',
    		'url'=>url('admin/unit'),
    	]);
    }
}

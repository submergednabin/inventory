<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductStock;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Unit;
use Validator;
use Auth;

class ProductStockController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function index($product_id){
    	$stocks = ProductStock::orderBy('updated_at','DESC')->where('product_id',$product_id)->where('status','1')->get();
        $product = Product::find($product_id);
        $category = ProductCategory::find($product->category_id);
        $unit = Unit::find($product->unit_id);
    	return view('inventory.product-stock.index',compact('stocks','product','category','unit'));
    }

    public function createStock(Request $request){
    	if(!$request->ajax()){
            return false;
        }
    	$products = Product::orderBy('item_name','ASC')->pluck('item_name','id');
    	return view('inventory.product-stock.create',compact('products'));
    }

    public function storeStock(Request $request){
    	if(!$request->ajax()){
            return false;
        }
    	$rules = [
    		'product_flag'=>'required',
    		'product_in_out_amount'=>'required',
    	];
    	$message = [
            'product_flag.required'=>'The Product Flag field is required',
    		'product_in_out_amount.required'=>'The number product added or deducted is required',
    	];
    	$validate = Validator::make($request->all(),$rules,$message);
    	if($validate->fails()){
    		return response()->json(array(
                'status'    => 'fails',
                'errors'    => $validate->getMessageBag()->toArray()
            ));
    		
    	}else{
    		$input = $request->all();

    		$input['product_in_out_amount'] = $request->product_in_out_amount?$request->product_in_out_amount:null;
    		$input['product_flg'] = $request->product_flag?$request->product_flag:null;
    		if($request->product_flag=='in'){
    			$total = $request->total_stock + $request->product_in_out_amount ; 
    		}else if($request->product_flag=='out'){
    			$total = $request->total_stock - $request->product_in_out_amount ;
    		}else{
    			$total = $request->total_stock;
    		}
    		$product = ProductStock::create([
    			'product_id'=>$request->product_id,
    			'total_stock'=>$total,
    			'product_in_out_amount'=>$request->product_in_out_amount,
    			'product_flg'=>$request->product_flag,
    		]);
    		session()->flash('message','The product stock is added');
    		return response()->json([
    			'status'=>'success',
    			'url'=>url('admin/product'),
    		]);
    	}
    }

    public function editStock(Request $request,$id){
    	if(!$request->ajax()){
            return false;
        }
        $item = Product::find($id);
    	$stockProducts = ProductStock::orderBy('updated_at','DESC')->where('product_id',$id)->take(1)->get();
    	$products = Product::orderBy('item_name','ASC')->pluck('item_name','id');
    	if(count($stockProducts)>0){
    		return view('inventory.product-stock.edit',compact('stockProducts','products','item'));
    	}else{
    		return view('inventory.product-stock.create',compact('stockProducts','products','item'));
    		
    	}
    }

    public function updateStock(Request $request,$id){
        if(!request()->ajax()){
            return false;
        }
    	$rules = [
            'product_flag'=>'required',
            'product_in_out_amount'=>'required',
        ];
        $message = [
            'product_flag.required'=>'The Product Flag field is required',
            'product_in_out_amount.required'=>'The number product added or deducted is required',
        ];
    	$validate = Validator::make($request->all(),$rules,$message);
    	if($validate->fails()){
    		// return redirect('admin/product/edit')
    		return response()->json([
    			'status'=>'fails',
    			'errors'=>$validate->getMessageBag()->toArray()
    		]);
    	}else{
    		$input = $request->all();
    		$input['product_flg']= $request->product_flag;
    		if($request->product_flag=='in'){
    			$total = $request->total_stock + $request->product_in_out_amount; 
    		}else if($request->product_flag=='out'){
    			$total = $request->total_stock - $request->product_in_out_amount;
    		}else{
    			$total = $request->total_stock;
    		}
            $productStock = ProductStock::find($id);
            $input['product_id'] = $request->product_id;
    		$input['total_stock']=$total;
    		ProductStock::create([
                'product_id'=>$request->product_id,
                'product_flg'=>$request->product_flag,
                'total_stock'=>$total,
                'product_in_out_amount'=>$request->product_in_out_amount,
            ]);
    		session()->flash('message','Product stock updated.');
    		return response()->json([
    			'status'=>'success',
    			'url'=>url('admin/product'),
    		]);
    	}
    }

    public function editEachStock($stock_id){
        $stock = ProductStock::find($stock_id);
        $product = Product::find($stock->product_id);
        return view('inventory.product-stock.edit-stock',compact('stock','product'));
    }

    public function updateEachStock(Request $request,$stock_id){
        $rules = [
            'product_flag'=>'required',
            'product_in_out_amount'=>'required',
        ];
        $message = [
            'product_flag.required'=>'The Product Flag field is required',
            'product_in_out_amount.required'=>'The number product added or deducted is required',
        ];
        $validate = Validator::make($request->all(),$rules,$message);
        if($validate->fails()){
            return redirect('admin/product-stock/edit-stock/'.$stock_id)
                ->withErrors($validate)
                ->withInput();
        }else{
            $input = $request->all();
            $input['product_flg']= $request->product_flag;
            if($request->product_flag=='in'){
                $total = $request->total_stock + $request->product_in_out_amount; 
            }else if($request->product_flag=='out'){
                $total = $request->total_stock - $request->product_in_out_amount;
            }else{
                $total = $request->total_stock;
            }
            $input['total_stock'] = $total;
            $stock = ProductStock::find($stock_id);
            $stock->update($input);
            session()->flash('message','The product stock is updated.');
            return redirect('admin/product-stock/list/'.$stock->product_id);
        }
    }

    public function destroyStock(Request $request,$stock_id){
        if(!$request->ajax()){
            return false;
        }
        $stock = ProductStock::find($stock_id);
        $stock->update([
            'status'=>0,
        ]);
        session()->flash('message','Successfully removed');
        return response()->json([
            'status'=>'success',
            'url'=>url('admin/product-stock/list/'.$stock_id),
        ]);
    }
}

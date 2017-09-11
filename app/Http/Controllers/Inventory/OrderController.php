<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Validator;

class OrderController extends Controller
{
	public function __construct(){
		$this->middleware('admin');
	}
    public function index(){
    	$orders = Order::orderBy('id','DESC')->get();
    	return view('inventory.order.index',compact('orders'));

    }

    public function create(){
    	$product = Product::orderBy('item_name','ASC')->pluck('item_name','id');
    	return view('inventory.order.create',compact('product'));
    }
    public function getProductListsByAjax(){



        $products = Product::pluck('item_name', 'id');

        return response()->json($products);


    }

    public function store(Request $request){
    	if (!request()->ajax()) {
            return false;
        }
    	$rules = [
    		'fullname'=>'required',
    		'product_id'=>'required',
    		'quantity'=>'required',
    		'price'=>'required',
    	];
    	$message = [
    		'product_id.required'=>'Product is required',
    	];
    	$validate = Validator::make($request->all(),$rules,$message);
    	if($validate->fails()){
    		return response()->json([
    			'status'=>'fails',
    			'errors'=>$validate->getMessageBag()->toArray()
    		]);
    		/*return redirect('admin/order/create')
    			->withErrors($validate)
    			->withInput();*/
    	}else{
    		$date = date('Ymd');
    		/*$dateExplode = explode('-',$date);
    		dd($dateExplode);*/
    		$findInvoice_id = Order::all();
    		if(count($findInvoice_id)>0){
    			$order = Order::orderBy('id','DESC')->first();
    			$string = substr($order->invoice_id, 8);
    			$i = $string + 1;
    			$invoice = $date.$i;
    		}else{
    			$invoice  = $date.'1';
    		}
    		
    		$input = $request->all();
    		$saveOrder = Order::create([
    			'fullname'=>$request->fullname,
    			'address'=>$request->address,
    			'phone_number'=>$request->phone_number,
    			'order_status'=>$request->order_status,
    			'invoice_id'=>$invoice,
    		]);

    		$multiple = Input::only('product_id_array','quantity_array','price_array','discount_price_array');
    		$product= $multiple['product_id_array'];
    		$quantity = $multiple['quantity_array'];
			$price = $multiple['price_array'];    		
			$discountPrice = $multiple['discount_price_array'];
			foreach($quantity as $key=>$item) {
				$mul = [
					'order_id'=>$saveOrder->id,
					'product_id'=>$product[$key],
					'quantity'=>$quantity[$key],
					'price'=>$price[$key],
					'discount_price'=>$discountPrice[$key],
				];
				$saveOrderItem = OrderItem::create($mul);
			}   		
			session()->flash('message','Order created successfully.');
			return response()->json(array(
                'status' => 'success',
                'url' => url('admin/order'),
                
            ));
			// return redirect('admin/order/create');

    	}
    }

    public function edit($id){
    	$order = Order::find($id);
    	$products = Product::pluck('item_name','id');
    	$orderItems = OrderItem::where('order_id',$order->id)->get();
    	return view('inventory.order.edit',compact('order','products','orderItems'));
    }
    public function update(Request $request,$id){
    	if(!$request->ajax()){
    		return false;
    	}
    	$rules = [
    		'fullname'=>'required',
    		'product_id'=>'required',
    		'quantity'=>'required',
    		'price'=>'required',
    	];
    	$message = [
    		'product_id.required'=>'Product is required',
    	];
    	$validate = Validator::make($request->all(),$rules,$message);
    	if($validate->fails()){
    		return response()->json([
    			'status'=>'fails',
    			'errors'=>$validate->getMessageBag()->toArray(),
    		]);
    	}else{
    		$OrderItems = OrderItem::where('order_id',$id)->delete();

    		$input = $request->all();
    		$findOrder = Order::find($id);
    		$findOrder->update($input);
    		
    		$multiple = Input::only('product_id_array','quantity_array','price_array','discount_price_array');
    		$product= $multiple['product_id_array'];
    		$quantity = $multiple['quantity_array'];
			$price = $multiple['price_array'];    		
			$discountPrice = $multiple['discount_price_array'];

			foreach($quantity as $key=>$item) {
				$mul = [
					'order_id'=>$id,
					'product_id'=>$product[$key],
					'quantity'=>$quantity[$key],
					'price'=>$price[$key],
					'discount_price'=>$discountPrice[$key],
				];
				$saveOrderItem = OrderItem::create($mul);
			}   		
			session()->flash('message','Order updated successfully.');
			return response()->json(array(
                'status' => 'success',
                'url' => url('admin/order'),
            ));

    	}
    }

    public function getOrderPrint(Request $request,$id){
		 $order = Order::find($id);
		 $orderItems = OrderItem::where('order_id',$order->id)->get();
		 return view('inventory.order.getOrderPrint',compact('order','orderItems'));   	
    }

    public function getPendingOrder(){
    	$pendingOrders = Order::where('order_status',1)->get();
    	return view('inventory.order.pendingOrder',compact('pendingOrders'));
    }
    public function getCompletedOrder(){
    	$completedOrders = Order::where('order_status',2)->get();
    	return view('inventory.order.completedOrder',compact('completedOrders'));
    }
    public function getCancelOrder(){
    	$cancelledOrders = Order::where('order_status',3)->get();
    	return view('inventory.order.cancelledOrder',compact('cancelledOrders'));
    }
}

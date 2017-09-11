@if(count($stockProducts)>0)
	<input type="hidden" name="product_id" value="{{$item->id}}">
	<div class="form-group">
	<label class="col-sm-2">Product Name<span style="color:red">&nbsp;*</span></label>
	<div class="col-sm-6">
		{{Form::text('product_name',$item->item_name,['class'=>'form-control','readonly'=>'readonly'])}}
		<span class="error-message"></span>
	</div>
	</div>
<div class="form-group">
	<label class="col-sm-2">Total Stocked Product</label>
	<div class="col-sm-6">
		{{Form::text('total_stock',$stockProduct->total_stock,['class'=>'form-control','readonly'=>'readonly'])}}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">Stock Type<span style="color:red">&nbsp;*</span></label>
	<div class="col-sm-6">
		{{Form::select('product_flag',['in'=>'in','out'=>'out'],$stockProduct->product_flg,['class'=>'form-control','placeholder'=>'Select one'])}}
		<span class="error-message"></span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">No. of Product In/Out<span style="color:red">&nbsp;*</span></label>
	<div class="col-sm-6">
		{{Form::text('product_in_out_amount',null,['class'=>'form-control','placeholder'=>'Enter In/Out Product Here'])}}
		<span class="error-message"></span>
		
	</div>
</div>
<div class="form-group">
	<div class="col-sm-8">
		<button type="submit" class="btn btn-warning">Update</button>
	</div>
</div>
@else
<input type="hidden" name="product_id" value="{{$item->id}}">
<div class="form-group">
	<label class="col-sm-2">Product Name</label>
	<div class="col-sm-6">
		{{Form::text('product_name',$item->item_name,['class'=>'form-control','readyonly'=>'readonly'])}}
		<span class="error-message"></span>
		
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">Total Stocked Product<span style="color:red">&nbsp;*</span></label>
	<div class="col-sm-6">
		{{Form::text('total_stock',null,['class'=>'form-control','readonly'=>'readonly'])}}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">Stock Type<span style="color:red">&nbsp;*</span></label>
	<div class="col-sm-6">
		{{Form::select('product_flag',['in'=>'in','out'=>'out'],'in',['class'=>'form-control','placeholder'=>'Select one'])}}
		<span class="error-message"></span>
		
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">Product In/Out<span style="color:red">&nbsp;*</span></label>
	<div class="col-sm-6">
		{{Form::text('product_in_out_amount',null,['class'=>'form-control','placeholder'=>'Enter In/Out Product Here'])}}
		<span class="error-message"></span>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-8">
		<button type="submit" class="btn btn-warning">Create</button>
	</div>
</div>
@endif
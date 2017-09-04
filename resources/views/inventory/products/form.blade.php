<div class="form-group">
	<label class="col-sm-2">Item Name<span style="color: red">&nbsp;*</span></label>
	<div class="col-sm-4">
		{{Form::text('item_name',null,['class'=>'form-control','placeholder'=>'Enter Product Item Name'])}}

		@if ($errors->has('item_name'))
        <div class="col-md-12 col-md-offset-3">
            <span class="help-block">
              {{ $errors->first('item_name') }}
            </span>
        </div>
        @endif
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">Store Keeping Unit(SKU)<span style="color: red">&nbsp;*</span></label>
	<div class="col-sm-4">
		{{Form::text('sku',null,['class'=>'form-control','placeholder'=>'Enter SKU'])}}
		@if ($errors->has('sku'))
        <div class="col-md-12 col-md-offset-3">
            <span class="help-block">
              {{ $errors->first('sku') }}
            </span>
        </div>
        @endif
	</div>
</div>
<div class="form-group">
        <label for="profilepic" class="col-sm-3 control-label">Product Image<span class=help-block" style="color: #b30000">&nbsp;* </span></label>

        <div class="col-sm-6">
            <input onchange="document.getElementById('thumb').src = window.URL.createObjectURL(this.files[0])"
                   name="image" type="file" placeholder="">
            Upload Image
        </div>

        @if(!Request::segment('4') == 'edit')
            <div class="col-md-8 col-md-offset-3">
                <img width="150px" id="thumb"/>
            </div>
        @else
            <div class="col-md-8 col-md-offset-3">
                {{ Html::image($product->image,'',['width'=>'100px','id'=>'thumb', 'class'=>'table-team-img']) }}
            </div>
        @endif

        @if ($errors->has('image'))
            <div class="col-md-12 col-md-offset-3">
                <span class="help-block">
                  {{ $errors->first('image') }}
                </span>
            </div>
        @endif
    </div>
<div class="form-group">
	<label class="col-sm-2">Category Name<span style="color: red">&nbsp;*</span></label>
	<div class="col-sm-4">
	@if(!Request::segment(4)=='edit')
		{{Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>'Select Category'])}}
		
	@else
	{{Form::select('category_id',$categories,$product->category_id,['class'=>'form-control','placeholder'=>'Select Category'])}}
	@endif
		@if ($errors->has('category_id'))
        <div class="col-md-12 col-md-offset-3">
            <span class="help-block">
              {{ $errors->first('category_id') }}
            </span>
        </div>
        @endif
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">Item Unit<span style="color: red">&nbsp;*</span></label>
	<div class="col-sm-4">
	@if(!Request::segment(4)=='edit')
		{{Form::select('unit_id',$units,null,['class'=>'form-control','placeholder'=>'Select Item Unit'])}}
	@else
		
		{{Form::select('unit_id',$units,$product->unit_id,['class'=>'form-control','placeholder'=>'Select Item Unit'])}}
	@endif
		@if ($errors->has('category_id'))
        <div class="col-md-12 col-md-offset-3">
            <span class="help-block">
              {{ $errors->first('category_id') }}
            </span>
        </div>
        @endif
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">Cost Price<span style="color:red">&nbsp;*</span></label>
	<div class="col-sm-4">
		{{Form::text('cost_price',null,['class'=>'form-control','placeholder'=>'Enter Cost Price'])}}
		@if ($errors->has('cost_price'))
        <div class="col-md-12 col-md-offset-3">
            <span class="help-block">
              {{ $errors->first('cost_price') }}
            </span>
        </div>
        @endif
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">Selling Price<span style="color:red">&nbsp;*</span></label>
	<div class="col-sm-4">
		{{Form::text('selling_price',null,['class'=>'form-control','placeholder'=>'Enter Selling Price'])}}
		@if ($errors->has('selling_price'))
        <div class="col-md-12 col-md-offset-3">
            <span class="help-block">
              {{ $errors->first('selling_price') }}
            </span>
        </div>
        @endif
	</div>
</div>
<div class="form-group">
	<div class="col-sm-6 text-right">
		@if(!Request::segment(4)=='edit')
			<button type="submit" class="btn btn-warning">Create</button>
		@else
			<button type="submit" class="btn btn-warning">Update</button>
		@endif
	</div>
</div>
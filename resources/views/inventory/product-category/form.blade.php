<div class="form-group">
	<label class="col-sm-2">Category Name<span style="color: red">&nbsp;*</span></label>
	<div class="col-sm-6">
		{{Form::text('category_name',null,['class'=>'form-control','placeholder'=>'Enter Product category'])}}
		@if ($errors->has('category_name'))
        <div class="col-md-12 col-md-offset-3">
            <span class="help-block">
              {{ $errors->first('category_name') }}
            </span>
        </div>
        @endif
	</div>
</div>
<div class="form-group">
	<div class="col-sm-8 text-right">
		@if(!Request::segment(4)=='edit')
			<button type="submit" class="btn btn-warning">Create</button>
		@else
			<button type="submit" class="btn btn-warning">Update</button>
		@endif
	</div>
</div>
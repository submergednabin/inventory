<div class="form-group">
	<div class="col-sm-2">
		<label>FullName<span style="color: red">&nbsp;*</span></label>
	</div>
	<div class="col-sm-6">
		{{Form::text('fullname',null,['class'=>'form-control','placeholder'=>'Enter Fullname'])}}
		@if ($errors->has('fullname'))
        <div class="col-md-12 col-md-offset-3">
            <span class="help-block">
              {{ $errors->first('fullname') }}
            </span>
        </div>
        @endif
	</div>
</div>
<div class="form-group">
	<div class="col-sm-2">
		<label>Address</label>
	</div>
	<div class="col-sm-6">
		{{Form::text('address',null,['class'=>'form-control','placeholder'=>'Enter address'])}}
	</div>
</div>
<div class="form-group">
	<div class="col-sm-2">
		<label>Phone<span style="color: red">&nbsp;*</span></label>
	</div>
	<div class="col-sm-6">
		{{Form::text('phone',null,['class'=>'form-control','placeholder'=>'Enter phone'])}}
		@if ($errors->has('phone'))
        <div class="col-md-12 col-md-offset-3">
            <span class="help-block">
              {{ $errors->first('phone') }}
            </span>
        </div>
        @endif
	</div>
</div>
<div class="form-group">
	<div class="col-sm-2">
		<label>Email</label>
	</div>
	<div class="col-sm-6">
		{{Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter email'])}}
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
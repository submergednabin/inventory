<div class="form-group">
	<label class='col-sm-2'>Fullname<span style="color: red">&nbsp;*</span></label>
	<div class="col-sm-4">
		{{Form::text('fullname',null,['class'=>'form-control'])}}
		<span class="error-message"></span>
	</div>
	<label class='col-sm-2'>Address</label>
	<div class="col-sm-4">
		{{Form::text('address',null,['class'=>'form-control'])}}
	</div>
</div>
<div class="form-group">
	<label class='col-sm-2'>Phone Number</label>
	<div class="col-sm-4">
		{{Form::text('phone_number',null,['class'=>'form-control'])}}
	</div>
	<label class='col-sm-2'>Status</label>
	<div class="col-sm-4">
		{{Form::select('order_status',['1'=>'Pending','2'=>'Completed','3'=>'Cancel'],null,['class'=>'form-control'])}}
	</div>
</div>
<div class="box-body">
    <h3>Product</h3>

    <div class="clonedInput">

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Product<span class=help-block" style="color: #b30000">&nbsp;* </span>
            </label>

            <div class="col-sm-4">
				{{Form::select('product_id[]',$product,null,['class'=>'form-control xxx product_id select2 selected product','placeholder'=>'Select Product','required'=>true])}}

                <span class="create_product_id_error error-message"></span>
                {{--<span class="error-msg" v-show="!input">--}}
                {{--This field is required.--}}
                {{--</span>--}}
            </div>

            <div class="col-sm-6 fetch-selected-record">


            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Quantity
                <span class=help-block" style="color: #b30000">&nbsp;* </span>
            </label>

            <div class="col-sm-4">
                <input type="number" name="quantity[]" class="form-control" value="{{ old('quantity[]') }}" required>
                {{--{{ Form::number('quantity[]' ,null, ['class'=>'form-control']) }}--}}
                <span class="error-message"></span>
            </div>

            
        </div>
        <div class="form-group">
        	<label for="name" class="col-sm-2 control-label">Price
            </label>

            <div class="col-sm-4">
                <input type="number" name="price[]" class="form-control" value="{{ old('price[]') }}">
                {{--{{ Form::number('price[]' ,null, ['class'=>'form-control']) }}--}}
                <span class="error-message"></span>
            </div>
        </div>
        <div class="form-group">
            <label for="discount_price" class="col-sm-2 control-label">Discounted Price
                <span class=help-block" style="color: #b30000">&nbsp;* </span>
            </label>

            <div class="col-sm-4">
                <input type="number" name="discount_price[]" class="form-control" value="{{ old('discount_price[]') }}">
                {{--{{ Form::number('discount_price[]' ,null, ['class'=>'form-control']) }}--}}
                <!-- <span class="error-message"></span> -->
            </div>
        </div>
        <div class="row add-remove">
        	<div class="col-md-12">
        		
            <a href="#" class="button-remove btn-danger btn-sm" value="Delete box">Remove Product
			<span class="glyphicon glyphicon-remove"></span>
            </a>
        	</div>
        </div>
        
    </div>
    <div class="row add-remove">
        	<div class="col-md-12">
			    <a href="#" class="button-add btn-danger btn-sm" value="Clone box">Add Product
						<span class="glyphicon glyphicon-plus"></span>
			    </a>
	    </div>
	    </div>
    {{--@endif--}}
</div>


<script>

    $(document).ready(function () {
        $('.button-add').click(function (e) {
            e.preventDefault();
            $(".clonedInput:last").find('.xxx').select2('destroy');
            var clone = $(".clonedInput:last").clone().insertAfter(".clonedInput:last");
            $('.clonedInput').append(clone);
            $('.xxx').select2();
            clone.find('[type=number]').val("");
            clone.find('[type=select]').val("");
            $('.clonedInput:last .fetch-selected-record').empty();
            $('.clonedInput:last .product').empty();
            $.get(APP_URL + "/admin/order/get-products-by-ajax",
                    function (data) {
                        console.log(data);
                        $('.clonedInput:last .product').append("<option value=''>--Select Product--</option>");
                        $.each(data, function (i, item) {
                            $('.clonedInput:last .product').append('<option value="' + i + '">' + data[i] + '</option>')
                        });
                    }
            );
        });

        $(document).on("click", ".button-remove", function (e) {
            e.preventDefault();
            if ($('.clonedInput').length > 1) {
                $(this).closest(".clonedInput").remove();
            }
        });
    });
</script>




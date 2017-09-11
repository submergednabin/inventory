<div class="col-xs-12">
<div class="col-md-12" >
<h3> Product</h3>
<div id="field">
<div id="field0">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-1 control-label" for="product_id">Product<span style="color: red">&nbsp;*</span></label>  
  <div class="col-md-5">
  {{Form::select('product_id[]',$product,null,['class'=>'form-control','placeholder'=>'Select Product','required'=>'required'])}}
   
  </div>
</div>
<br><br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-1 control-label" for="quantity">Quantity<span style="color: red">&nbsp;*</span></label>  
  <div class="col-md-5">
  <input id="quantity" name="quantity[]" type="text" placeholder="" class="form-control input-md" required="required">
  
  </div>
</div>
<br><br>
<div class="form-group">
  <label class="col-md-1 control-label" for="price">Price<span style="color: red">&nbsp;*</span></label>  
  <div class="col-md-5">
  <input id="price" name="price[]" type="text" placeholder="" class="form-control input-md" required="required">
 
  </div>
</div>
<br><br>
<div class="form-group">
  <label class="col-md-1 control-label" for="discount_price">Discounted Price</label>  
  <div class="col-md-5">
  <input id="discount_price" name="discount_price[]" type="text" placeholder="" class="form-control input-md">
  </div>
</div>
<br><br>
</div>
</div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-1">
    <button id="add-more" name="add-more" class="btn btn-warning">Add More Product</button>
  </div>
</div>
<br><br>
        </div>
     </div>
    </div>
<script>
	$(document).ready(function () {
    var next = 0;
    $("#add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = ' <div id="field'+ next +'" name="field'+ next +'"><!-- Text input--><div class="form-group"><label class="col-md-1 control-label" for="product_id">Product<span style="color: red">&nbsp;*</span></label> <div class="col-md-5"> {{Form::select("product_id[]",$product,null,["class"=>"form-control","placeholder"=>"Select Product","required"=>"required"])}}</div></div><br><br> <!-- Text input--><div class="form-group"> <label class="col-md-1 control-label" for="quantity">Quantity<span style="color: red">&nbsp;*</span></label> <div class="col-md-5"> <input id="quantity" name="quantity[]" type="text" placeholder="" class="form-control input-md" required="required"></div></div><br><br><div class="form-group"> <label class="col-md-1 control-label" for="price">Price<span style="color: red">&nbsp;*</span></label> <div class="col-md-5"> <input id="price" name="price[]" type="text" placeholder="" class="form-control input-md" required="required"></div></div><br><br><div class="form-group"> <label class="col-md-1 control-label" for="discount_price">Discounted Price</label> <div class="col-md-5"> <input id="discount_price" name="discount_price[]" type="text" placeholder="" class="form-control input-md"> </div></div><br><br></div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove Product</button></div></div><div id="field">';
        
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                console.log(fieldNum);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });

});
</script>
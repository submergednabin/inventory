@extends('inventory.main')
@section('title','Edit Product Stock')
@section('content')
    <section class="content-header">
        <h1>
            Edit Stock
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <!-- form start -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::open([ 'method'=> 'POST','url' => 'admin/product-stock/update-stock/'.$stock->id,'class' => 'form-horizontal','files'=>true ])
                                !!}
                                @include('inventory.flash.message')
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="form-group">
                                        <label class="col-sm-2">Product Name<span style="color:red">&nbsp;*</span></label>
                                        <div class="col-sm-6">
                                            {{Form::text('product_name',$product->item_name,['class'=>'form-control','readonly'=>'readonly'])}}
                                        </div>
                                        </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Total Stocked Product</label>
                                        <div class="col-sm-6">
                                            {{Form::text('total_stock',$stock->total_stock,['class'=>'form-control','readonly'=>'readonly'])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Stock Type<span style="color:red">&nbsp;*</span></label>
                                        <div class="col-sm-6">
                                            {{Form::select('product_flag',['in'=>'in','out'=>'out'],$stock->product_flg,['class'=>'form-control','placeholder'=>'Select one'])}}
                                            @if ($errors->has('product_flag'))
                                                <div class="col-md-12 col-md-offset-3">
                                                    <span class="help-block">
                                                      {{ $errors->first('product_flag') }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">No. of Product In/Out<span style="color:red">&nbsp;*</span></label>
                                        <div class="col-sm-6">
                                            {{Form::text('product_in_out_amount',null,['class'=>'form-control','placeholder'=>'Enter In/Out Product Here'])}}
                                            @if ($errors->has('product_in_out_amount'))
                                                <div class="col-md-12 col-md-offset-3">
                                                    <span class="help-block">
                                                      {{ $errors->first('product_in_out_amount') }}
                                                    </span>
                                                </div>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <button type="submit" class="btn btn-warning">Update</button>
                                        </div>
                                    </div>
                                
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@stop
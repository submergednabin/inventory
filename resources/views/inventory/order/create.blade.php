@extends('inventory.main')
@section('title','Order Items')
@section('content')
    <section class="content-header">
        <h1>
            Add Order
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
                            @include('inventory.flash.message')
                            <div class="col-md-12">
                                {{ Form::open(['url'=>'admin/order/store', 'class'=>'form-horizontal update-user','files'=>true]) }}
                                <div class="form-group">
                                   <div class="col-sm-12 text-right">
                                       <button type="submit" class="btn btn-warning">Place Order</button>
                                   </div> 
                                </div>
                                 @include('inventory.order.form')
                                <div class="form-group">
                                   <div class="col-sm-12 text-right">
                                       <button type="submit" class="btn btn-warning">Place Order</button>
                                   </div> 
                                </div>
                                {{ Form::close() }}
                            </div>


                        </div>
                    </div>
                </div><!-- /.box -->


            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@stop
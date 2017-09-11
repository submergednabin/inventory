@extends('inventory.main')
@section('title','Order Items')
@section('content')
	<section class="content-header">
        <h1>
            Order
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                @include('inventory.flash.message')

                <div class="box">
                    <div class="box-body">
                        <div class="table-reponsive">
                            <table id="example1" class="table table-bordered table-striped user-list">
                                <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>OrderBy</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Order Product</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($cancelledOrders as $order)
                                    <tr>
                                        <td>#{{ $order->invoice_id }}</td>
                                        <td class="generate-tool-tip">
                                            <span class="glyphicon glyphicon-info-sign"></span>
                                            {{ $order->fullname }}
                                        </td>
                                        <td>
                                            {{ $order->address?$order->address:'N/A' }}
                                        </td>
                                        <td>
                                            {{ $order->phone_number?$order->phone_number:'N/A' }}<br>
                                        </td>
                                        <?php
                                        	$orderItems = \App\Models\OrderItem::orderBy('id','DESC')->where('order_id',$order->id)->get();
                                        	
                                        ?>
                                        <td>

                                            @foreach($orderItems as $item)
                                            	<?php
                                            	// echo $item->product_id;
                                            		$product = \App\Models\Product::find($item->product_id);
                                            	?>
                                               {{ $product->item_name }}<br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($order->order_status == '1')
                                               {{ 'Pending' }}
                                            @elseif($order->order_status == '2')
                                               {{ 'Complete' }}
                                            @else
                                                {{ 'Cancelled' }}
                                            @endif
                                        </td>
                                        <td>
                                                <a type="button" title="Edit Order" class="btn btn-primary btn-sm"
                                                   href="{{ url('admin/order/edit/'.$order->id) }}">
                                                    <i class="flaticon-edit"></i>
                                                </a>

                                                <form action="{{ url('#') }}"
                                                      method="DELETE" class="delete-user-form">
                                                    {!! csrf_field() !!}

                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="flaticon-delete-button"></i>
                                                    </button>
                                                </form>
                                            <button class="btn btn-danger edit-user-form" title="Print Preview" data-url="{{ url('admin/order/print/'.$order->id) }}"><i class="fa fa-print"></i>
                                            </button>
                                        </td>
                                        
                                    </tr>
                                @endforeach


                            </table>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->

        </div><!-- /.row -->
    </section><!-- /.content -->
    <script>
        $(function () {
            $('#example1').DataTable({
                "order": [[ 0, "desc" ]],
                "pageLength": 100,
                "dom": '<"top"pfl<"clear">>rt<"bottom"p<"clear">>'
            });

        });
    </script>


@stop
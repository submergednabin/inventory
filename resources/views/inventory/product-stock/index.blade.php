@extends('inventory.main')
@section('title','Stock Management')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Stock Management List
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
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Unit</th>
                                <th>SKU</th>
                                <th>Cost Price</th>
                                <th>Selling Price</th>
                                <th>Total Stock</th>
                                <th>Product Flag</th>
                                <th>No. of Product Added/Removed</th>
                                <th>Date of Stock Added or Removed</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($stocks as $stock)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $product->item_name?$product->item_name:'N/A' }}</td>
                                    <td>
                                        @if($product->image)
                                            {{ Html::image($product->image, '',['width'=>'50px','height'=>'50px']) }}
                                        @else
                                            {{'N/A'}}
                                        @endif
                                    </td>

                                    <td>
                                        @if(!empty($category))
                                        {{$category->category_name?$category->category_name:'N/A'}}
                                        @else
                                            {{'N/A'}}
                                        @endif
                                    </td>
                                    <td>{{ $unit->unit_name?$unit->unit_name:'N/A' }}</td>
                                    <td>{{ $product->sku?$product->sku:'N/A' }}</td>
                                    <td>{{$product->cost_price?$product->cost_price:'N/A'}}</td>
                                    <td>{{$product->selling_price?$product->selling_price:'N/A'}}</td>
                                    <td>{{$stock->total_stock?$stock->total_stock:'N/A'}}</td>
                                    <td>{{$stock->product_flg?$stock->product_flg:'N/A'}}</td>
                                    <td>{{$stock->product_in_out_amount?$stock->product_in_out_amount:'N/A'}}</td>

                                    <td>{{$stock->updated_at?$stock->updated_at:'N/A'}}</td>
                                    <td>
                                        <a  type="button" class="btn btn-primary btn-sm"
                                            href="{{url('admin/product-stock/edit-stock/'.$stock->id)}}">
                                            <i class="flaticon-edit"></i>
                                        </a>
                                        <form action="{{ url('admin/product-stock/destroy/'.$stock->id) }}" method="DELETE" class="delete-user-form">
                                            {!! csrf_field() !!}

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="flaticon-delete-button"></i>
                                            </button>
                                        </form>
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

@stop

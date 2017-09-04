@extends('inventory.main')
@section('title','Product Category')
@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Vendors
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
                                <th>Product Item Name</th>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Unit</th>
                                <th>SKU</th>
                                <th>Cost Price</th>
                                <th>Selling Price</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($products as $product)
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
                                    <td>{{$product->category_id?$product->category_id:'N/A'}}</td>
                                    <td>{{ $product->unit_id?$product->unit_id:'N/A' }}</td>
                                    <td>{{ $product->sku?$product->sku:'N/A' }}</td>
                                    <td>{{$product->cost_price?$product->cost_price:'N/A'}}</td>
                                    <td>{{$product->selling_price?$product->selling_price:'N/A'}}</td>
                                    <td>
                                        <a  type="button" class="btn btn-primary btn-sm"
                                            href="{{ route('product.edit', array($product->id)) }}">
                                            <i class="flaticon-edit"></i>
                                        </a>

                                        <form action="{{ route('product.destroy', array($product->id)) }}" method="DELETE" class="delete-user-form">
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

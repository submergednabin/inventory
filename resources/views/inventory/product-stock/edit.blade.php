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
                            @foreach($stockProducts as $stockProduct)
                                {{ Form::open(['url'=>'admin/product-stock/update/'.$stockProduct->id, 'class'=>'form-horizontal update-user','files'=>true]) }}

                                 @include('inventory.product-stock.form')

                                {{ Form::close() }}
                            @endforeach
                            </div>


                        </div>
                    </div>
                </div><!-- /.box -->


            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
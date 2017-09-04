@extends('inventory.main')
@section('title','Add Vendor Details')
@section('content')
    <section class="content-header">
        <h1>
            Add Vendor
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
                                {{ Form::open(['url'=>'admin/vendor', 'class'=>'form-horizontal','files'=>true]) }}

                                 @include('inventory.vendor.form')

                                {{ Form::close() }}
                            </div>


                        </div>
                    </div>
                </div><!-- /.box -->


            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@stop
@extends('inventory.main')
@section('title','Add Unit')
@section('content')
    <section class="content-header">
        <h1>
            Add Product Category
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
                                {{ Form::open(['url'=>'admin/unit', 'class'=>'form-horizontal','files'=>true]) }}

                                 @include('inventory.unit.form')

                                {{ Form::close() }}
                            </div>


                        </div>
                    </div>
                </div><!-- /.box -->


            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@stop
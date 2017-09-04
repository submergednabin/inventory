@extends('inventory.main')
@section('title','Edit Vendor Details')
@section('content')
    <section class="content-header">
        <h1>
            Edit Vendor Credentials
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
                                {!! Form::model($vendor, [
                                        'route' => ['vendor.update', $vendor->id],
                                        'class' => 'form-horizontal',
                                        'method'=> 'PATCH',
                                        'files'=>true
                                    ])
                                !!}
                                @include('inventory.flash.message')
                                @include('inventory.vendor.form')
                                
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@stop
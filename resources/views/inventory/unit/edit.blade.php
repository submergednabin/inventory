@extends('inventory.main')
@section('title','Edit Product Category')
@section('content')
    <section class="content-header">
        <h1>
            Edit Product Category
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
                                {!! Form::model($unit, [
                                        'route' => ['unit.update', $unit->id],
                                        'class' => 'form-horizontal',
                                        'method'=> 'PATCH',
                                        'files'=>true
                                    ])
                                !!}
                                @include('inventory.flash.message')
                                @include('inventory.unit.form')
                                
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@stop
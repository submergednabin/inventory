@extends('inventory.main')
@section('title','Product unit')
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
                                <th>Unit Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($units as $unit)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $unit->unit_name?$unit->unit_name:'N/A' }}</td>
                                    <td>
                                        <a type="button" class="btn btn-primary btn-sm"
                                            href="{{ route('unit.edit', array($unit->id)) }}">
                                            <i class="flaticon-edit"></i>
                                        </a>

                                        <form action="{{ route('unit.destroy', array($unit->id)) }}" method="DELETE" class="delete-user-form">
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

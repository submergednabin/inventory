@extends('inventory.main')
@section('title','Vendor Details')
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
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($vendors as $vendor)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $vendor->fullname?$vendor->fullname:'N/A' }}</td>
                                    <td>{{$vendor->email?$vendor->email:'N/A'}}</td>
                                    <td>{{$vendor->phone?$vendor->phone:'N/A'}}</td>
                                    <td>{{$vendor->address?$vendor->address:'N/A'}}</td>
                                    <td>
                                        <a  type="button" class="btn btn-primary btn-sm"
                                            href="{{ route('vendor.edit', array($vendor->id)) }}">
                                            <i class="flaticon-edit"></i>
                                        </a>

                                        <form action="{{ route('vendor.destroy', array($vendor->id)) }}"
                                              method="DELETE" class="delete-user-form">
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

<script>
    $(function () {
        $('#example1').DataTable({
            "pageLength": 100,
            "dom": '<"top"pfl<"clear">>rt<"bottom"p<"clear">>'
        });
    });
</script>

@stop
@extends('layouts.app')

@section('content')
    <div class="col-xs-12 row buffer-top-10 buffer-bottom-10">
        <a href="products/add" class="btn btn-success">Add product</a>
    </div>
    <table class="table table-bordered" id="products-table">
        <thead>
        <tr>
            <th>Product Id</th>
            <th>Title</th>
            <th>Brand</th>
            <th>Screen</th>
            <th>Actions</th>
        </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script src=""></script>
<script>
    $(function() {
        $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('products.data') !!}',
            columns: [
                { data: 'id', name: 'id'},
                { data: 'title', name: 'title'},
                { data: 'brand', name: 'brand',searchable: false},
                { data: 'screen', name: 'screen'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush

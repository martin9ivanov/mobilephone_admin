@extends('layouts.app')

@section('content')
    <div class="col-xs-12 row buffer-top-10 buffer-bottom-10">
        <a href="os/add" class="btn btn-success">Add OS</a>
    </div>
    <table class="table table-bordered" id="os-table">
        <thead>
        <tr>
            <th>OS id</th>
            <th>Name</th>
            <th>OS active</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script src=""></script>
<script>
    $(function() {
        $('#os-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('os.data') !!}',
            columns: [
                { data: 'id', name: 'id'},
                { data: 'name', name: 'name'},
                { data: 'active', name: 'active'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
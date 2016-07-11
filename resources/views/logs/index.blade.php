@extends('layouts.app')

@section('content')
    <table class="table table-bordered" id="logs-table">
        <thead>
        <tr>
            <th>Log Id</th>
            <th>Username</th>
            <th>User email</th>
            <th>Login on</th>
        </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script src=""></script>
<script>
    $(function() {
        $('#logs-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('logs.data') !!}',
            columns: [
                { data: 'id', name: 'id'},
                { data: 'username', name: 'username'},
                { data: 'user_email', name: 'user_email'},
                { data: 'login', name: 'login'}
            ]
        });
    });
</script>
@endpush
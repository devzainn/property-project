@extends('layouts.app')

@section('title')

@section('contents')
<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Kelola Notaris</h1>
        <a href="{{ route('notaries.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Manage Users</div>
            <div class="card-body">
                <div class="table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
<script>
    
</script>
@endpush
@extends('layouts.app')

@section('title')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Buyers</h1>
    </div>
    <hr />
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Manage Buyers</div>
            <div class="card-body table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
@push('js')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
<script>

</script>
@endpush

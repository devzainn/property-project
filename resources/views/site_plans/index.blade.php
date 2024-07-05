<!-- resources/views/site_plan/index.blade.php -->
@extends('layouts.app')

@section('title')

@section('contents')
<div class="container">
    @if($latestSitePlan && $latestSitePlan->file_path)
    <div class="text-center mb-4" id="panzoom-container" style="border: 1px solid #ccc; overflow: hidden; width: 100%; height: 350px;">
        <img id="panzoom-image" src="{{ asset('storage/' . $latestSitePlan->file_path) }}" alt="Latest Site Plan Image" style="width: 100%; height: auto;">
    </div>
    @endif
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Site Plan</h1>
        <a href="{{ route('site_plans.create') }}" class="btn btn-primary">Update Site Plan</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Location</th>
                <th>Status</th>
                <th>Gambar</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($siteplans as $sp)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sp->name }}</td>
                    <td>{{ $sp->location }}</td>
                    <td>{{ $sp->status }}</td>
                    <td>
                        @if($sp->file_path)
                            <img src="{{ asset('storage/' . $sp->file_path) }}" alt="Site Plan Image" style="max-width: 100px; max-height: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('site_plans.show', $sp->id) }}" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('site_plans.edit', $sp->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('site_plans.destroy', $sp->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6">No Site Plans found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById('panzoom-container');
        var panzoom = Panzoom(element, {
            contain: 'outside',
            maxScale: 5,
            minScale: 1
        });

        element.addEventListener('dblclick', function(event) {
            var scale = panzoom.getScale();
            if (scale < 2) {
                panzoom.zoomTo(event.clientX, event.clientY, 2);
            } else {
                panzoom.reset();
            }
        });

        element.addEventListener('wheel', panzoom.zoomWithWheel);
    });
</script>
@endsection

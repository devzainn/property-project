@extends('layouts.app')

@section('title')

@section('contents')
<div class="container">
    <h1 class="mb-0">Add Property</h1>
    <form action="{{ route('site_plans.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="file">Upload File:</label>
            <input type="file" name="file" class="form-control">
        </div>
        <div class="row mx-auto">
            <div class="d-grid gap-2 d-md-block">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
</div>
@endsection

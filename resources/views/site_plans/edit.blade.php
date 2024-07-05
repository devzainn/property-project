<!-- resources/views/site_plan/edit.blade.php -->
@extends('layouts.app')

@section('title')

@section('contents')
<div class="container">
    <h1>Edit Site Plan</h1>
    <form action="{{ route('site_plans.update', $siteplans->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $siteplans->name }}">
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" class="form-control" value="{{ $siteplans->location }}">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" class="form-control" value="{{ $siteplans->status }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control">{{ $siteplans->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="file">Upload File:</label>
            <input type="file" name="file" class="form-control">
        </div>
        @if($siteplans->file_path)
            <div class="form-group">
                <label>Current File:</label>
                <a href="{{ asset('storage/' . $siteplans->file_path) }}" target="_blank">View File</a>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

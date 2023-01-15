@extends('layouts.mainlayout')

@section('title','Delete Category')

@section('content')
    <h2>Are you sure to delete category {{ $category->name }}?</h2>
    <div class="mt-4">
        <a href="{{ route('admin.category.destroy', $category->name) }}" class="btn btn-danger me-2">Delete</a>
        <a href="{{ route('admin.category') }}" class="btn btn-info">Cancel</a>
    </div>
@endsection

@extends('layouts.mainlayout')

@section('title','Delete Category')

@section('content')
    <h2>Are you sure to delete book {{$book->title}}?</h2>
    <div class="mt-4">
        <a href="{{ route('admin.book.destroy', $book->slug) }}" class="btn btn-danger me-2">Delete</a>
        <a href="{{ route('admin.books') }}" class="btn btn-info">Cancel</a>
    </div>
@endsection

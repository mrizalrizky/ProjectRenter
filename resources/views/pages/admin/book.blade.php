@extends('layouts.mainlayout')

@section('title','Books')

@section('content')
    <h1>Book List</h1>

    <div class="my-5 d-flex justify-content-end">
        <a href="{{ route('admin.deletedbook') }}" class="btn btn-secondary me-3">View Deleted Books</a>
        <a href="{{ route('admin.book.add') }}" class="btn btn-primary">Add New Book</a>
    </div>

    <div class="mt-5">
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif
    </div>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</</th>
                    <th>Code</</th>
                    <th>Title</</th>
                    <th>Category</th>
                    <th>Status</</th>
                    <th>Action</</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $item)
                <tr>
                    <td>{{ $loop ->iteration }}</td>
                    <td>{{ $item->book_code }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        @foreach ($item->categories as $category)
                            {{ $category->name }} <br>
                        @endforeach
                    </td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('admin.book.edit', $item->slug) }}">Edit</a>
                        <a href="{{ route('admin.book.delete', $item->slug) }}">Delete</a>
                    </td>
                @empty
                    <td class="text-center" colspan="6">No Data</td>
                @endforelse
                </tr>
            </tbody>
        </table>
    </div>
@endsection

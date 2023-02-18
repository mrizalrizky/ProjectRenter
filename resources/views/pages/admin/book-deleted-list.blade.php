@extends('layouts.mainlayout')

@section('title','Deleted Book List')

@section('content')
    <h1>Deleted Book List</h1>
    <div class="mt-5 d-flex justify-content-end">
        <a href="{{ route('admin.books') }}" class="btn btn-secondary me-3">Back</a>
    </div>
    <div class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($deletedBooks as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->book_code }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        <a href="{{ route('admin.book.restore', $item->slug) }}">Restore</a>
                    </td>
                @empty
                    <td class="text-center" colspan="4">No Data</td>
                @endforelse
                </tr>
            </tbody>
        </table>
    </div>
@endsection

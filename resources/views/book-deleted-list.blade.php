@extends('layouts.mainlayout')

@section('title','Deleted Book List')

@section('content')
    <h1>Deleted Book List</h1>
    <div class="mt-5 d-flex justify-content-end">
        <a href="/books" class="btn btn-secondary me-3">Back</a>
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
                @foreach ($deletedBooks as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->book_code}}</td>
                        <td>{{$item->title}}</td>
                        <td>
                            <a href="/book-restore/{{ $item->slug }}">restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

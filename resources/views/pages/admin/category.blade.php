@extends('layouts.mainlayout')

@section('title','Categories')

@section('content')
    <h1>Category List</h1>
    <div class="mt-5 d-flex justify-content-end">
        <a href="category-deleted" class="btn btn-secondary me-3">View Deleted Category</a>
        <a href="category-add" class="btn btn-primary">Add New Category</a>
    </div>

    <div class="mt-5">
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif
    </div>

    <div class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <a href="category-edit/{{ $item->name }}">Edit</a>
                        <a href="category-delete/{{$item->name}}">Delete</a>
                    </td>
                </tr>
                @empty
                    <td class="text-center" colspan="3">No Data</td>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

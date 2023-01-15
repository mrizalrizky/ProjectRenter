@extends('layouts.mainlayout')

@section('title','Deleted Category')

@section('content')
    <h1>Deleted Category List</h1>
    <div class="mt-5 d-flex justify-content-end">
        <a href="{{ route('admin.category')}}" class="btn btn-secondary me-3">Back</a>
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
                <tr>
                @forelse ($deletedCategories as $item)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route('admin.category.restore', $item->name) }}">Restore</a>
                    </td>
                @empty
                    <td class="text-center" colspan="3">No Data</td>
                @endforelse
                </tr>
            </tbody>
        </table>
    </div>
@endsection

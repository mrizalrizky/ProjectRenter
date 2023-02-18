@extends('layouts.mainlayout')

@section('title','Users')

@section('content')
    <h1>Unapproved User List</h1>
    <div class="mt-5 d-flex justify-content-end">
        <a href="{{ route('admin.users') }}" class="btn btn-secondary me-3">Back</a>
    </div>
    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($registeredUsers as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->username }}</td>
                    <td>
                        @if ($item->phone)
                            {{ $item->phone }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.user.detail', $item->slug) }}">Detail</a>
                    </td>
                @empty
                    <td class="text-center" colspan="4">No Data</td>
                @endforelse
                </tr>
            </tbody>
        </table>
    </div>
@endsection

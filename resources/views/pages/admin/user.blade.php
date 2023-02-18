@extends('layouts.mainlayout')

@section('title','User List')

@section('content')
    <h1>User List</h1>
    <div class="mt-5 d-flex justify-content-end">
        <a href="{{ route('admin.bannedusers')}}" class="btn btn-secondary me-3">View Banned User</a>
        <a href="{{ route('admin.registeredusers') }}"class="btn btn-primary">View Unapproved Users</a>
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
                    <th>No.</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$item->username  }}</td>
                    <td>
                        @if ($item->phone)
                        {{ $item->phone }}
                        @else
                        -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.user.detail', $item->slug) }}">Detail</a>
                        <a href="{{ route('admin.user.delete', $item->slug) }}">Ban</a>
                    </td>
                @empty
                    <td class="text-center" colspan="4">No Data</td>
                @endforelse
                </tr>
            </tbody>
        </table>

    </div>
@endsection

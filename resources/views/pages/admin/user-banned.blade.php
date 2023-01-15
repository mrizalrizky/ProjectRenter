@extends('layouts.mainlayout')

@section('title','Banned Users')

@section('content')
    <h1>Banned User List</h1>
    <div class="mt-5 d-flex justify-content-end">
        <a href="{{ route('admin.users') }}" class="btn btn-secondary me-3">Back</a>
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
                <tr>
                @forelse ($bannedUsers as $item)
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
                        <a href="{{ route('admin.user.restore', $item->slug) }}">Restore</a>
                    </td>
                    </tr>
                @empty
                    <td class="text-center" colspan="4">No Data</td>
                @endforelse
                </tr>
            </tbody>
        </table>
    </div>
@endsection

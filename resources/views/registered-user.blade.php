@extends('layouts.mainlayout')

@section('title','Users')

@section('content')
    <h1>Unapproved User List</h1>
    <div class="mt-5 d-flex justify-content-end">
        <a href="/users" class="btn btn-secondary me-3">View Approved Users</a>
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
                @foreach ($registeredUsers as $item)
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
                            <a href="/user-detail/{{$item->slug}}">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection

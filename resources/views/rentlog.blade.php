@extends('layouts.mainlayout')

@section('title','Rent Log')

@section('content')
<h1>Rent Logs</h1>
<div class="my-5">
    <table class="table">
        <thead>
            <tr>
                <th>No.</</th>
                <th>Username</</th>
                <th>Book Title</</th>
                <th>Rent Date</th>
                <th>Return Date</</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rentLogs as $logs)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $logs->user->username }}</td>
                <td>{{ $logs->book->title }}</td>
                <td>{{ $logs->rent_date }}</td>
                <td>{{ $logs->return_date }}</td>
                @empty
                <td class="text-center" colspan="5">No Data</td>
                @endforelse
            </tr>
        </tbody>
    </table>
</div>
@endsection

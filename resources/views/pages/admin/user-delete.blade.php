@extends('layouts.mainlayout')

@section('title','Delete User')

@section('content')
    <h2>Are you sure to delete user {{$user->username}}?</h2>
    <div class="mt-4">
        <a href="{{ route('admin.user.destroy', $user->slug) }}" class="btn btn-danger me-2">Delete</a>
        <a href="{{ route('admin.users') }}" class="btn btn-info">Cancel</a>
    </div>
@endsection

@extends('layouts.mainlayout')

@section('title','Profile')

@section('content')
<h1>Hi, {{Auth::user()->username}}</h1>
<div class="my-5 w-25">
    <div class="mb-3">
        <label for="" class="form-label">Username</label>
        <input type="text" class="form-control" readonly value="{{$user->username}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Phone</label>
        <input type="text" class="form-control" readonly value="{{$user->phone}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Address</label>
        <textarea name="" id="" cols="30" rows="7" class="form-control" readonly style="resize: none">{{$user->address}}</textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Status</label>
        <input type="text" class="form-control" readonly value="{{$user->status}}">
    </div>
</div>
@endsection

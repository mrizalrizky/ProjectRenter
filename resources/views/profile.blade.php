@extends('layouts.mainlayout')

@section('title','Profile')

@section('content')
<h1>Hi, {{Auth::user()->username}}</h1>

@endsection

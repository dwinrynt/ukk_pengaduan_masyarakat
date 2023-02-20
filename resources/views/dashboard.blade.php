@extends('layouts.app')
@section('content')
    @if (auth()->user()->role == 'super admin')
        @include('dashboard.super_admin')
    @elseif (auth()->user()->role == 'admin')
        @include('dashboard.admin')
    @elseif (auth()->user()->role == 'petugas')
        @include('dashboard.petugas')
    @elseif (auth()->user()->role == 'masyarakat')
        @include('dashboard.masyarakat')
    @endif
@endsection
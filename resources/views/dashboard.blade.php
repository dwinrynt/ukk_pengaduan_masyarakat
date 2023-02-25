@extends('layouts.app')
@section('content')
    @if (auth()->user()->role == 'super admin')
        @include('super_admin.dashboard')
    @elseif (auth()->user()->role == 'admin')
        @include('admin.dashboard')
    @elseif (auth()->user()->role == 'petugas')
        @include('petugas.dashboard')
    @elseif (auth()->user()->role == 'masyarakat')
        @include('masyarakat.dashboard')
    @endif
@endsection
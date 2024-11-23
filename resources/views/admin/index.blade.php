@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Welcome, Admin</h2>
    <p>Ini adalah halaman dashboard admin.</p>
    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection
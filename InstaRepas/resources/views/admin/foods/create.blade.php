@extends('layouts.app')

@section('content')
    <h2>Create Food</h2>
    <form action="{{ route('admin.foods.store') }}" method="post">
        @csrf
        @include('admin.foods.form')
        <button type="submit" class="btn btn-primary">Create Food</button>
    </form>
@endsection

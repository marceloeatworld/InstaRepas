<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2>Create Food</h2>
    <form action="{{ route('admin.foods.store') }}" method="post">
        @csrf
        @include('admin.foods.form')
        <button type="submit" class="btn btn-primary">Create Food</button>
    </form>
        </div>

    </div>
</x-app-layout>

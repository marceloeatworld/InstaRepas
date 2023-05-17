<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


    <div class="w-full p-6 border border-gray-200 rounded-lg shadow flex items-center justify-center text-center" style="background-color: #082f49;">
        <img class="w-16 h-16 rounded-full object-cover" src="{{ asset('images/image.png') }}" alt="Image1">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-white mx-4 tracking-wider">Modifier nourriture</h5>
        </a>
        <img class="w-16 h-16 rounded-full object-cover" src="{{ asset('images/image.png') }}" alt="Image2">
    </div>

    <form action="{{ route('admin.foods.update', $food) }}" method="post" class="space-y-6">
        @csrf
        @method('PUT')
        @include('admin.foods.form')
        <button type="submit" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Modifier</button>
    </form>
</div>

</x-app-layout>

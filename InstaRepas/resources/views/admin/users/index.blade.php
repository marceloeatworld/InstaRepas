<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <nav>
        <ul>
            <li><a href="{{ route('admin.foods.index') }}">Food</a></li>
            <li><a href="{{ route('admin.foods.create') }}">Ajouter Food</a></li>
        </ul>
    </nav>

    <div class="w-full p-6 border border-gray-200 rounded-lg shadow flex items-center justify-center text-center" style="background-color: #082f49;">
        <img class="w-16 h-16 rounded-full object-cover" src="{{ asset('images/image.png') }}" alt="Image1">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-white mx-4 tracking-wider">Les utilisateurs</h5>
        </a>
        <img class="w-16 h-16 rounded-full object-cover" src="{{ asset('images/image.png') }}" alt="Image2">
    </div>


    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">Username</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Is Admin</th>
                <th scope="col" class="px-6 py-3">Points</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            @if($user->id == 1)
                    @continue
                @endif
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">{{ $user->id }}</td>
                    <td class="px-6 py-4">{{ $user->username }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">
                        <form action="{{ route('admin.users.toggleAdmin', $user) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="is_admin" value="{{ $user->is_admin ? 0 : 1 }}">
                            <button type="submit" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">{{ $user->is_admin ? 'Yes' : 'No' }}</button>
                        </form>
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('admin.users.updatePoints', $user) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="number" name="points" value="{{ $user->points }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <button type="submit" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 mt-2">Update Points</button>
                        </form>
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('admin.users.destroy', $user) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
</x-app-layout>


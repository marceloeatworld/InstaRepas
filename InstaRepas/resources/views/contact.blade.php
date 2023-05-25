<x-app-layout>
    <div class="flex justify-center py-6 px-4 sm:px-6 lg:px-8">
        <div class="w-full sm:w-4/5 md:w-3/5 lg:w-2/5 xl:w-1/3">
            
            <h1 class="text-2xl sm:text-3xl text-center font-bold mb-6">Contactez-nous</h1>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Succès!</strong>
                    <span class="text-sm block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4 sm:space-y-6">
                @csrf
                <input type="text" name="name" value="{{ Auth::user() ? Auth::user()->username : '' }}" placeholder="Nom" {{ Auth::user() ? 'readonly' : '' }} class="w-full px-3 py-2 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
                <input type="email" name="email" value="{{ Auth::user() ? Auth::user()->email : '' }}" placeholder="Email" {{ Auth::user() ? 'readonly' : '' }} class="w-full px-3 py-2 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
                <select name="subject" class="w-full px-3 py-2 text-gray-900 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
                    <option value="technical_problem">Problème technique</option>
                    <option value="information">Information</option>
                    <option value="suggestion">Suggestion</option>
                </select>
                <textarea name="message" placeholder="Votre message" class="w-full px-3 py-2 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 h-24"></textarea>
                <button type="submit" class="w-full px-6 py-2 text-lg text-white bg-blue-600 rounded-md hover:bg-blue-700">Envoyer</button>
            </form>
        </div>
    </div>
</x-app-layout>

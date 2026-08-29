<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>

    <div class="flex justify-center items-center min-h-[70vh]">
        <div class="w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-800 p-6">

            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6 text-center">
                Login
            </h2>

            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Email
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5"
                        required>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Password
                    </label>
                    <input type="password" name="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5"
                        required>
                </div>

                <button type="submit"
                    class="w-full text-white bg-indigo-600 hover:bg-indigo-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Login
                </button>
            </form>
        </div>
    </div>
</x-layout>
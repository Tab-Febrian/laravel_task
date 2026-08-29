<x-admin.layout>
    <div class="pt-16 sm:pt-20">

        {{-- Card Welcome --}}
        <div
            class="bg-gradient-to-r from-blue-600 to-indigo-600 shadow-lg rounded-lg p-6 border border-transparent text-center mb-8 text-white">
            <h1 class="text-3xl font-bold">Welcome to Admin Panel</h1>
            <p class="text-sm sm:text-base mt-2 opacity-90">
                Selamat datang di dashboard admin. Kelola data siswa, guru, mata pelajaran, dan lainnya dengan mudah.
            </p>
        </div>

        {{-- Grid Statistik --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            @php
                $stats = [
                    ['title' => 'Total Students', 'value' => 128, 'icon' => '🎓', 'color' => 'from-indigo-500 to-blue-500'],
                    ['title' => 'Total Teachers', 'value' => 25, 'icon' => '👩‍🏫', 'color' => 'from-purple-500 to-pink-500'],
                    ['title' => 'Subjects', 'value' => 10, 'icon' => '📚', 'color' => 'from-green-500 to-emerald-500'],
                    ['title' => 'Classrooms', 'value' => 8, 'icon' => '🏫', 'color' => 'from-yellow-400 to-orange-500'],
                ];
            @endphp

            @foreach ($stats as $item)
                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 text-center transition transform hover:-translate-y-1 hover:shadow-lg">
                    <div
                        class="w-12 h-12 mx-auto flex items-center justify-center text-2xl rounded-full bg-gradient-to-r {{ $item['color'] }} text-white mb-3">
                        {{ $item['icon'] }}
                    </div>
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $item['title'] }}</h2>
                    <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mt-2">{{ $item['value'] }}</p>
                </div>
            @endforeach
        </div>

        {{-- Placeholder Grafik --}}
        <div
            class="border-2 border-dashed rounded-xl border-gray-300 dark:border-gray-700 h-96 flex flex-col items-center justify-center text-center">
            <span class="text-gray-400 dark:text-gray-500 mb-2">📊 Tambahkan grafik atau laporan di sini...</span>
            <button
                class="mt-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition">
                + Tambah Grafik
            </button>
        </div>

    </div>
</x-admin.layout>

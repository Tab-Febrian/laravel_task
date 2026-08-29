<x-admin.layout :title="$title">

    <div class="flex justify-between items-center mt-10 mb-6"> 
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Classroom List</h1>
        
        {{-- Tombol Tambah Kelas --}}
        <button
            data-modal-target="addClassroomModal"
            data-modal-toggle="addClassroomModal"
            class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
            + Tambah Kelas
        </button>
    </div>

    @if (session('success'))
        <div id="alert-success" class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1.49-5.55a1 1 0 0 1 0 1.996 1 1 0 0 1-.58 1.83l-.68.16a1 1 0 0 1-1.12-.99 1 1 0 0 1 1.7-.85l.18-.09a1 1 0 0 0 .58-.92V8a1 1 0 0 1 2 0v2.44Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif

    {{-- SEARCH --}}
    <form method="GET" action="{{ route('admin.classroom.index') }}" class="mb-4 flex gap-2">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari Nama atau Nama Pelajar"
            class="w-full px-4 py-2 text-sm rounded-lg border
                   border-gray-300 text-gray-900
                   focus:ring-blue-500 focus:border-blue-500
                   dark:bg-gray-700 dark:border-gray-600
                   dark:text-white dark:placeholder-gray-400
                   dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
        <button
            type="submit"
            class="px-5 py-2 text-sm font-medium text-white
                   bg-blue-600 hover:bg-blue-700
                   dark:bg-blue-700 dark:hover:bg-blue-800
                   rounded-lg">
            Cari
        </button>
    </form>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama Kelas</th>
                    <th scope="col" class="px-6 py-3">Siswa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classrooms as $room)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $room->name }}
                        </td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                            @if ($room->students->count())
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach ($room->students as $student)
                                        <li>{{ $student->name }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-gray-400 italic">Belum ada siswa</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4 text-gray-700 dark:text-gray-300">
        {{ $classrooms->links() }}
    </div>
    @include('admin.classroom.create')
    
    {{-- Anda juga harus mengulang dan meng-include modal edit di sini jika sudah ada --}}
    {{-- @foreach ($classroom as $room) --}}
        {{-- @include('admin.classroom.edit', ['room' => $room]) --}}
    {{-- @endforeach --}}

</x-admin.layout>
<x-admin.layout :title="$title">

    {{-- Header dan Tombol Tambah --}}
    <div class="flex justify-between items-center mt-10 mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Student List</h1>
        <button
            data-modal-target="addStudentModal"
            data-modal-toggle="addStudentModal"
            class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
            + Tambah Student
        </button>
    </div>

    {{-- SEARCH --}}
    <form method="GET" action="{{ route('admin.student.index') }}" class="mb-4 flex gap-2">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari Nama atau Kelas"
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

    {{-- Tabel Data Students --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">#</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Tanggal Lahir</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Alamat</th>
                    <th scope="col" class="px-6 py-3">Kelas</th>
                    <th scope="col" class="px-6 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop Pertama (Tabel) --}}
                @foreach ($students as $i => $student)
                    {{-- ❗ Tambahkan Cek Keamanan di sini --}}
                    @if (is_object($student)) 
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">{{ $i + 1 }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $student->name }}</td>
                            <td class="px-6 py-4">{{ $student->birthday }}</td>
                            <td class="px-6 py-4">{{ $student->email }}</td>
                            <td class="px-6 py-4">{{ $student->address }}</td>
                            <td class="px-6 py-4">{{ $student->classroom->name ?? '-' }}</td>
                            <td class="px-6 py-4 text-right flex justify-end items-center space-x-2">
                                {{-- Tombol Edit --}}
                                <button
                                    data-modal-target="editStudentModal{{ $student->id }}"
                                    data-modal-toggle="editStudentModal{{ $student->id }}"
                                    type="button"
                                    class="px-3 py-1 text-sm font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                    Edit
                                </button>

                                {{-- Form Hapus --}}
                                <form action="{{ route('admin.student.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus student ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif {{-- Akhir Cek Keamanan --}}
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4 text-gray-700 dark:text-gray-300">
        {{ $students->links() }}
    </div>

    @include('admin.student.create', ['classrooms' => $classrooms])
    @foreach ($students as $student)
        @if (is_object($student)) 
            @include('admin.student.edit', ['student' => $student, 'classrooms' => $classrooms])
        @endif {{-- Akhir Cek Keamanan --}}
    @endforeach

</x-admin.layout>
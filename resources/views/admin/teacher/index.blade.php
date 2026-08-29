<x-admin.layout :title="$title">

    {{-- Konten Utama Halaman --}}
    <div class="flex justify-between items-center mt-10 mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Teacher List</h1>

        {{-- Tombol untuk membuka Modal Tambah --}}
        <button data-modal-target="addTeacherModal" data-modal-toggle="addTeacherModal"
            class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">
            + Tambah Teacher
        </button>
    </div>

    {{-- SEARCH --}}
    <form method="GET" action="{{ route('admin.teacher.index') }}" class="mb-4 flex gap-2">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari Nama atau Mata Pelajaran"
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

    {{-- Tabel Daftar Guru --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Mata Pelajaran</th>
                    <th scope="col" class="px-6 py-3">Telepon</th>
                    <th scope="col" class="px-6 py-3">Alamat</th>
                    <th scope="col" class="px-6 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teacher as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $item->name }}</td>
                        <td class="px-6 py-4 dark:text-gray-300">{{ $item->subject->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 dark:text-gray-300">{{ $item->phone }}</td>
                        <td class="px-6 py-4 dark:text-gray-300">{{ $item->address }}</td>

                        <td class="px-6 py-4 text-right flex justify-end space-x-2">
                            {{-- Tombol untuk membuka Modal Edit --}}
                            <button data-modal-target="editTeacherModal{{ $item->id }}"
                                data-modal-toggle="editTeacherModal{{ $item->id }}"
                                class="px-3 py-1 text-sm font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                Edit
                            </button>

                            {{-- Form Delete --}}
                            <form action="{{ route('admin.teacher.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus guru ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4 text-gray-700 dark:text-gray-300">
        {{ $teacher->links() }}
    </div>

    @include('admin.teacher.create', ['subjects' => $subjects])
    @foreach ($teacher as $item)
        @include('admin.teacher.edit', ['teacher' => $item, 'subjects' => $subjects])
    @endforeach

</x-admin.layout>
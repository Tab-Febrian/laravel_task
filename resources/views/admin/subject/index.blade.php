<x-admin.layout :title="$title">

    <div class="flex justify-between items-center mt-10 mb-6"> 
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Subject List</h1>
        
        <button
            data-modal-target="addSubjectModal"
            data-modal-toggle="addSubjectModal"
            class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">
            + Tambah Subject
        </button>
    </div>

    {{-- SEARCH --}}
    <form method="GET" action="{{ route('admin.subject.index') }}" class="mb-4 flex gap-2">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari Nama"
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
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama Subject</th>
                    <th class="px-6 py-3">Deskripsi</th>
                    <th class="px-6 py-3">Guru Pengampu</th>
                    <th class="px-6 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subj)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $subj->name }}</td>
                        <td class="px-6 py-4 max-w-sm overflow-hidden text-ellipsis whitespace-nowrap">
                            {{ $subj->description }}
                        </td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                            {{ $subj->teacher->name ?? 'Belum ada guru' }}
                        </td>
                        <td class="px-6 py-4 text-right flex justify-end space-x-2">
                            <button
                                data-modal-target="editSubjectModal{{ $subj->id }}"
                                data-modal-toggle="editSubjectModal{{ $subj->id }}"
                                class="px-3 py-1 text-sm font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                Edit
                            </button>

                            <form action="{{ route('admin.subject.destroy', $subj->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus subject ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @include('admin.subject.edit', ['subject' => $subj, 'teachers' => $teachers])
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4 text-gray-700 dark:text-gray-300">
        {{ $subjects->links() }}
    </div>

    {{-- Create modal --}}
    @include('admin.subject.create')

</x-admin.layout>
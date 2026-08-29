{{-- Modal Tambah Subject --}}
<div id="addSubjectModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center bg-black/50">
    <div class="relative p-4 w-full max-w-lg">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

            <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Tambah Mata Pelajaran Baru
                </h3>
                <button data-modal-hide="addSubjectModal" class="text-gray-500 hover:text-gray-900">✕</button>
            </div>

            <form action="{{ route('admin.subject.store') }}" method="POST" class="p-6 space-y-4">
                @csrf

                <div>
                    <label class="block mb-1 text-sm font-medium">Nama Subject</label>
                    <input type="text" name="name" required value="{{ old('name') }}"
                        class="w-full border rounded-lg p-2.5 dark:bg-gray-600 dark:text-white">
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Deskripsi</label>
                    <textarea name="description" rows="3"
                        class="w-full border rounded-lg p-2.5 dark:bg-gray-600 dark:text-white">{{ old('description') }}</textarea>
                </div>

                <div class="flex justify-end gap-2 pt-4">
                    <button type="button" data-modal-hide="addSubjectModal"
                        class="px-5 py-2.5 rounded-lg border border-gray-600 bg-gray-700 text-gray-300 hover:bg-gray-600 hover:text-white">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

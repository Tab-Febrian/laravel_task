<div id="editSubjectModal{{ $subj->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center w-full h-full bg-black bg-opacity-60">
    <div class="relative w-full max-w-2xl mx-4 bg-gray-800 rounded-lg shadow-xl p-6">

        {{-- Header --}}
        <div class="flex justify-between items-center border-b border-gray-700 pb-3 mb-5">
            <h1 class="text-xl font-semibold text-white">
                Edit Subject: {{ $subj->name }}
            </h1>
            <button type="button"
                class="text-gray-400 hover:text-gray-300"
                data-modal-hide="editSubjectModal{{ $subj->id }}">
                ✕
            </button>
        </div>

        <form action="{{ route('admin.subject.update', $subj->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-300">Nama Subject</label>
                <input type="text" name="name"
                       value="{{ $subj->name }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-300">Deskripsi</label>
                <textarea name="description" rows="4"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">{{ $subj->description }}</textarea>
            </div>

            {{-- Footer --}}
            <div class="flex justify-end gap-3 pt-2">
                <button type="button"
                    data-modal-hide="editSubjectModal{{ $subj->id }}"
                    class="px-5 py-2.5 rounded-lg border border-gray-600 bg-gray-700 text-gray-300 hover:bg-gray-600 hover:text-white">
                    Cancel
                </button>
                <button type="submit"
                    class="px-5 py-2.5 rounded-lg bg-blue-700 hover:bg-blue-800 text-white">
                    Save
                </button>
            </div>
        </form>

    </div>
</div>

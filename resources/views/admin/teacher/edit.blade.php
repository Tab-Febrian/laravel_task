{{-- Modal Edit Teacher --}}
<div id="editTeacherModal{{ $item->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full inset-0 h-[calc(100%-1rem)] max-h-full bg-black/50">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            
            {{-- Header --}}
            <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Teacher: {{ $item->name }}
                </h3>
                <button type="button" data-modal-hide="editTeacherModal{{ $item->id }}"
                    class="text-gray-400 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center">✕</button>
            </div>

            {{-- Form Update --}}
            <form action="{{ route('admin.teacher.update', $item->id) }}" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')

                {{-- Name --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" required value="{{ old('name', $item->name) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                </div>

                {{-- SUBJECT DROPDOWN --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata Pelajaran</label>
                    <select name="subject_id" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                        
                        <option value="">-- Pilih Mata Pelajaran --</option>

                        @if ($item->subject)
                            <option value="{{ $item->subject->id }}" selected>
                                {{ $item->subject->name }} (Saat ini)
                            </option>
                        @endif

                        @foreach ($subjects as $subj)
                            @if (!$subj->teacher || $subj->id == $item->subject_id)
                                <option value="{{ $subj->id }}" {{ $item->subject_id == $subj->id ? 'selected' : '' }}>
                                    {{ $subj->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                {{-- END SUBJECT DROPDOWN --}}

                {{-- Email --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" required value="{{ old('email', $item->email) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                </div>

                {{-- Phone --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                    <input type="text" name="phone" required value="{{ old('phone', $item->phone) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                </div>

                {{-- Address --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <input type="text" name="address" required value="{{ old('address', $item->address) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                </div>

                {{-- Buttons --}}
                <div class="flex justify-end gap-2 pt-4">
                    <button type="button" data-modal-hide="editTeacherModal{{ $item->id }}"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                        Save
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

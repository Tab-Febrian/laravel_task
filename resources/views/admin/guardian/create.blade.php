{{-- Modal Tambah Guardian --}}
<div id="addGuardianModal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center w-full p-4 overflow-x-hidden overflow-y-auto bg-black/50">
    <div class="relative w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add New Guardian</h3>
            <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white" data-modal-toggle="addGuardianModal">✕</button>
        </div>

        <form action="{{ route('admin.guardian.store') }}" method="POST" class="p-6 space-y-4">
            @csrf

            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" id="name" required value="{{ old('name') }}"
                    class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-white" />
            </div>

            <div>
                <label for="job" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job</label>
                <input type="text" name="job" id="job" required value="{{ old('job') }}"
                    class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-white" />
            </div>
            
            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                <input type="text" name="phone" id="phone" required value="{{ old('phone') }}"
                    class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-white" />
            </div>

            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}"
                    class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-white" />
            </div>

            <div>
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                <textarea name="address" id="address" rows="3" required
                    class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-white">{{ old('address') }}</textarea>
            </div>

            <button type="submit"
                class="w-full py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                Save
            </button>
        </form>
    </div>
</div>
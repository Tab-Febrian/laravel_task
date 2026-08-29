{{-- Modal Edit Guardian (ID unik per item) --}}
<div id="editGuardianModal{{ $item->id }}" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center w-full p-4 overflow-x-hidden overflow-y-auto bg-black/50">
    <div class="relative w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Guardian: {{ $item->name }}</h3>
            <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white" data-modal-toggle="editGuardianModal{{ $item->id }}">✕</button>
        </div>

        <form action="{{ route('admin.guardian.update', $item->id) }}" method="POST" class="p-6 space-y-4">
            @csrf
            @method('PUT') 

            <div>
                <label for="edit_name_{{ $item->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" id="edit_name_{{ $item->id }}" required value="{{ old('name', $item->name) }}"
                    class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-white" />
            </div>

            <div>
                <label for="edit_job_{{ $item->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job</label>
                <input type="text" name="job" id="edit_job_{{ $item->id }}" required value="{{ old('job', $item->job) }}"
                    class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-white" />
            </div>
            
            <div>
                <label for="edit_phone_{{ $item->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                <input type="text" name="phone" id="edit_phone_{{ $item->id }}" required value="{{ old('phone', $item->phone) }}"
                    class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-white" />
            </div>

            <div>
                <label for="edit_email_{{ $item->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="edit_email_{{ $item->id }}" required value="{{ old('email', $item->email) }}"
                    class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-white" />
            </div>

            <div>
                <label for="edit_address_{{ $item->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                <textarea name="address" id="edit_address_{{ $item->id }}" rows="3" required
                    class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-white">{{ old('address', $item->address) }}</textarea>
            </div>

            <button type="submit"
                class="w-full py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300">
                Update
            </button>
        </form>
    </div>
</div>
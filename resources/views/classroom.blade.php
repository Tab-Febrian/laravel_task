<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="w-full max-w-4xl mx-auto my-5 font-sans">
    <h2 class="text-center text-2xl font-bold mb-4">Daftar Kelas</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Daftar Siswa</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($classroom as $data)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $data['name'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        @foreach ($data->students as $student)
                            <div class="mb-1">{{ $student->name }}</div>
                        @endforeach
                        <!-- {{ $data['name'] }} -->
                    </td></tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-layout>
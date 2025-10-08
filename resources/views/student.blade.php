<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="w-full max-w-4xl mx-auto my-5 font-sans">
    <h2 class="text-center text-2xl font-bold mb-4">Daftar Siswa</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Lahir</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">E-mail</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- <tr>
                    <td style="padding: 12px; border: 1px solid #ddd;">12345</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">Muhammad Febrian</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">04-02-2009</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">Laki-laki</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">X PPLG 1</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border: 1px solid #ddd;">12346</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">Muhammad Zayyan Fahrezi</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">22-07-2009</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">Laki-laki</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">X PPLG 1</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border: 1px solid #ddd;">12347</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">Osmar Ghalib Albani</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">22-07-2009</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">Laki-laki</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">X PPLG 1</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border: 1px solid #ddd;">12348</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">Rajendra Ghasia Demarco</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">10-05-2009</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">Laki-laki</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">X PPLG 1</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border: 1px solid #ddd;">12349</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">Riffat Arfa Pramana</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">01-09-2009</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">Laki-laki</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">X PPLG 1</td> -->
                @foreach ($student as $data)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $data['name'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $data['birthday'] }}</td>
                    <!-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data['grade'] }}</td> -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->classroom->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data['email'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data['address'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-layout>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <h1>Profil Siswa</h1>
    <p>Nama: {{ $nama }}</p>
    <p>Kelas: {{ $kelas }}</p>
    <p>Sekolah: {{ $sekolah }}</p>
</body>
</html> -->

<x-layout>
  <x-slot:title>{{$title}}</x-slot:title>
  <h1 class="text-2xl font-bold">Profil Siswa</h1>
  <p class="mt-4 text-lg text-gray-700">Nama: {{ $nama }}</p>
  <p class="text-lg text-gray-700">Kelas: {{ $kelas }}</p>
  <p class="text-lg text-gray-700">Sekolah: {{ $sekolah }}</p>
</x-layout>
@extends('layout')

@section('content')
<a href="{{ route('guests.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Tambah Tamu</a>
<table class="mt-4 w-full table-auto bg-white">
    <thead>
        <tr>
            <th class="border px-4 py-2">Nama</th>
            <th class="border px-4 py-2">Instansi</th>
            <th class="border px-4 py-2">Tujuan</th>
            <th class="border px-4 py-2">Kontak</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Waktu</th>
            <th class="border px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($guests as $guest)
        <tr>
            <td class="border px-4 py-2">{{ $guest->name }}</td>
            <td class="border px-4 py-2">{{ $guest->institution }}</td>
            <td class="border px-4 py-2">{{ $guest->purpose }}</td>
            <td class="border px-4 py-2">{{ $guest->contact }}</td>
            <td class="border px-4 py-2">{{ $guest->status }}</td>
            <td class="border px-4 py-2">{{ $guest->visited_at }}</td>
           
            
            <td class="border px-4 py-2">
                <a href="{{ route('guests.edit', $guest->id) }}" class="text-blue-500">Edit</a> |
                <form action="{{ route('guests.destroy', $guest->id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-500" onclick="return confirm('Hapus tamu ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

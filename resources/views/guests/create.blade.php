@extends('layout')

@section('content')
<h2 class="text-xl mb-4">{{ isset($guest) ? 'Edit Tamu' : 'Tambah Tamu' }}</h2>
<form method="POST" action="{{ isset($guest) ? route('guests.update', $guest->id) : route('guests.store') }}" class="space-y-4">
    @csrf
    @if(isset($guest)) @method('PUT') @endif

    <input type="text" name="name" placeholder="Nama" value="{{ old('name', $guest->name ?? '') }}" required class="w-full px-4 py-2 border rounded" />
    <input type="text" name="institution" placeholder="Instansi/Perusahaan" value="{{ old('institution', $guest->institution ?? '') }}" class="w-full px-4 py-2 border rounded" />
    <input type="text" name="purpose" placeholder="Tujuan" value="{{ old('purpose', $guest->purpose ?? '') }}" required class="w-full px-4 py-2 border rounded" />
    <input type="text" name="contact" placeholder="Kontak (opsional)" value="{{ old('contact', $guest->contact ?? '') }}" class="w-full px-4 py-2 border rounded" />
    
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
        {{ isset($guest) ? 'Update' : 'Simpan' }}
    </button>
</form>
@endsection

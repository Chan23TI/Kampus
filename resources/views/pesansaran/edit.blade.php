<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('pesan_saran.update', $pesanSaran->id)}}">
        @csrf
        @method('PUT')

        <input type="text" name="nama" value="{{ old('nama',$pesanSaran->nama) }}" class="block w-full border-gray-300 rounded-md">
        {{-- //memanggil folder components/input-error di views --}}
        <x-input-error :messages="$errors->get('nama')" class="mt-2"/>


        <input type="text" name="email" value="{{ old('email',$pesanSaran->email) }}" class="block w-full border-gray-300 rounded-md mb-5">
        <x-input-error :messages="$errors->get('email')" class="mt-2"/>

        <textarea name="pesan"  class="block w-full border-gray-300 rounded-md mb-5">{{ old('pesan',$pesanSaran->pesan) }}</textarea>
        <x-primary-button class="mt-2">Simpan Perubahan</x-primary-button>
        </form>

    </div>
</x-app-layout>

<x-app-layout>
    {{-- //memanggil komponen di folder views/layouts --}}
    <div class="max-w-2xl mx-auto p-4 ">
        <form method="POST" action="{{ route('pesan_saran.store') }}">
            @csrf

            <input type="text" name="nama" placeholder="Nama anda" id="nama"
                class="block w-full border-gray-300 rounded-md mb-5">
            {{-- //memanggil folder components/input-error di views --}}
            <x-input-error :messages="$errors->get('message')" class="mt-2" />


            <input type="text" name="email" placeholder="Email anda" id="email"
                class="block w-full border-gray-300 rounded-md mb-5">
            <x-input-error :messages="$errors->get('message')" class="mt-2" />

            <textarea name="pesan" placeholder="Apa yang ingin anda sampaikan?"
                class="block w-full border-gray-300 rounded-md mb-5">{{ old('message') }}</textarea>
            <x-primary-button class="mt-2">Kirim pesan </x-primary-button>
        </form>

        <div class="mt-6">
            @foreach ($pesanSaran as $pesan)
                <div class="p-4 mb-4 bg-white rounded shadow">
                    <p>{{ $pesan->pesan }}</p>
                    <p><strong>Email : {{ $pesan->email }}</strong></p>
                    <p><small>Ditulis Oleh : {{ $pesan->user->name }}</small></p>


                </div>
                <a href="{{ route('pesan_saran.edit', $pesan) }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                    <!-- Ikon Heroicons (Pencil Icon) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5h2M7 7h10l-1 14H8L7 7z" />
                    </svg>
                    Edit
                </a>
                <!-- Delete Form -->
                <form action="{{ route('pesan_saran.destroy', $pesan) }}" method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
                        <!-- Ikon Trash -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-7 7-7-7" />
                        </svg>

                        Delete
                    </button>
                </form>
            @endforeach
        </div>
    </div>
</x-app-layout>

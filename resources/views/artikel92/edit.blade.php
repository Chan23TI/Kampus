<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Edit Artikel</h1>
        <form action="{{ route('artikel92.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf


            @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium">Tanggal</label>
                <input type="date" name="tanggal_92" value="{{ $artikel->tanggal_92 }}" class="mt-1 block w-full border-gray-300 rounded-md" required/>
                @error('tanggal_92')
                <span class="bg-red-500  text-white px-4 py-2 rounded">{{  $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Judul</label>
                <input type="text" name="judul_92" value="{{ $artikel->judul_92 }}" class="mt-1 block w-full border-gray-300 rounded-md" required/>
                @error('judul_92')
                <span class="bg-red-500  text-white px-4 py-2 rounded">{{  $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Kategori</label>
                <input type="text" name="status_92" class="mt-1 block w-full border-gray-300 rounded-md" required>{{ $artikel->kategori_92 }} />
                @error('kategori_92')
                <span class="bg-red-500  text-white px-4 py-2 rounded">{{  $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Status</label>
                <input type="text" name="status_92" class="mt-1 block w-full border-gray-300 rounded-md" required>{{ $artikel->status_92 }} />
                @error('status_92')
                <span class="bg-red-500  text-white px-4 py-2 rounded">{{  $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Isi Artikel</label>
                <textarea name="artikel_92" id="editor" rows="5" class="mt-1 block w-full border-gray-300 rounded-md" required>{{ $artikel->artikel_92 }}</textarea>
                @error('artikel_92')
                <span class="bg-red-500  text-white px-4 py-2 rounded">{{  $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Gambar</label>
                <input type="file" name="image" class="mt-1 block w-full" accept="image/*" />
                @if ($artikel->gambar_92)
                    <img src="{{ Storage::url($artikel->gambar_92) }}" class="h-48 mt-2" alt="Gambar Berita" />
                @endif
                @error('gambar_92')
                <span class="bg-red-500  text-white px-4 py-2 rounded">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>

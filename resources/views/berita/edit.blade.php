<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Edit Berita</h1>
        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf


            @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium">Judul</label>
                <input type="text" name="judul" value="{{ $berita->judul }}" class="mt-1 block w-full border-gray-300 rounded-md" required/>
                @error('judul')
                <span class="bg-red-500  text-white px-4 py-2 rounded">{{  $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Isi Berita</label>
                <textarea name="isi_berita" id="editor" rows="5" class="mt-1 block w-full border-gray-300 rounded-md" required>{{ $berita->isi_berita }}</textarea>
                @error('isi_berita')
                <span class="bg-red-500  text-white px-4 py-2 rounded">{{  $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Gambar</label>
                <input type="file" name="image" class="mt-1 block w-full" accept="image/*" />
                @if ($berita->gambar)
                    <img src="{{ Storage::url($berita->gambar) }}" class="h-48 mt-2" alt="Gambar Berita" />
                @endif
                @error('gambar')
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

<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Tambah Artikel</h1>
        <form action="{{ route('artikel92.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium">Tanggal</label>
                <input type="date" name="tanggal_92" class="mt-1 block w-full border-gray-300 rounded-md" required />
                @error('tanggal_92')
                <span class="bg-red-500  text-white px-4 py-2 rounded">{{  $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Judul</label>
                <input type="text" name="judul_92" class="mt-1 block w-full border-gray-300 rounded-md" required />
                @error('judul_92')
                <span class="bg-red-500  text-white px-4 py-2 rounded">{{  $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Kategori</label>
                <input type="text" name="kategori_92" class="mt-1 block w-full border-gray-300 rounded-md" required />
                @error('kategori_92')
                <span class="bg-red-500  text-white px-4 py-2 rounded">{{  $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Status</label>
                <input type="text" name="status_92" class="mt-1 block w-full border-gray-300 rounded-md" required />
                @error('status_92')
                <span class="bg-red-500  text-white px-4 py-2 rounded">{{  $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Isi Artikel</label>
                <textarea name="artikel_92" id="editor" rows="5" class="mt-1 block w-full border-gray-300 rounded-md" ></textarea>
                @error('artikel_92')
                <span class="bg-red-500  text-white px-4 py-2 rounded">{{  $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Gambar</label>
                <input type="file" name="gambar_92" class="mt-1 block w-full" accept="image/*" />
                @error('gambar_92')
                <span class="bg-red-500  text-white px-4 py-2 rounded">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    // Update the textarea value when the content changes
                    document.querySelector('textarea[name="isi_berita"]').value = editor.getData();
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>

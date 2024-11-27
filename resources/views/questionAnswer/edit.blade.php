<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('questionAnswer.update', $questionAnswer->id)}}">
        @csrf
        @method('PUT')

        <input type="text" name="question" value="{{ old('question',$questionAnswer->question) }}" class="block w-full border-gray-300 rounded-md">
        {{-- //memanggil folder components/input-error di views --}}
        <x-input-error :messages="$errors->get('question')" class="mt-2"/>


        <input type="text" name="answer" value="{{ old('answer',$questionAnswer->answer) }}" class="block w-full border-gray-300 rounded-md mb-5">
        <x-input-error :messages="$errors->get('answer')" class="mt-2"/>

        <x-primary-button class="mt-2">Simpan Perubahan</x-primary-button>
        </form>
    </div>
</x-app-layout>

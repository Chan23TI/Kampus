<section class="py-24">
    <div class="container">
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-6 lg:py-16 py-14 aos-init aos-animate" data-aos="fade-up">

                @foreach ($berita as $item)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="{{ Storage::url($item->gambar) }}" class="w-full h-48 object-cover" alt="Gambar Berita" />
                        <div class="p-4">
                            <h2 class="text-lg font-bold">{{ $item->judul }}</h2>
                            <p class="text-gray-600 mt-2">{!! Str::limit($item->isi_berita, 100) !!}</p>
                            <div class="mt-4">

                            </div>
                        </div>
                    </div>
                @endforeach

            {{-- <div>
                <img src="{{ Storage::url($item->gambar) }}" class="rounded-md mb-5">
                <h1 class="text-lg my-3 transition-all hover:text-primary"><a href="#">{{ $item->judul }}</a></h1>
                <p class="text-sm/relaxed tracking-wider text-gray-500">{!! Str::limit($item->isi_berita, 100) !!}
                    <a href="#" class="text-primary">read more</a>
                </p>
            </div> --}}

            {{-- <div>
                <img src="assets/images/blog/blog-2.png" class="rounded-md mb-5">

                <span class="bg-green-500/10 text-green-500 font-medium rounded-md text-xs py-1 px-2"><a href="#">Tutorial</a></span>
                <h1 class="text-lg my-3 transition-all hover:text-primary"><a href="#">What you should know before considering the Prompt</a></h1>
                <p class="text-sm/relaxed tracking-wider text-gray-500">We are giving a pretty extensive guideline and context before you make your decision to consider Prompt...
                    <a href="#" class="text-primary">read more</a>
                </p>
            </div>

            <div>
                <img src="assets/images/blog/blog-3.png" class="rounded-md mb-5">

                <span class="bg-teal-500/10 text-teal-500 font-medium rounded-md text-xs py-1 px-2"><a href="#">Community</a></span>
                <h1 class="text-lg my-3 transition-all hover:text-primary"><a href="#">Your Way to a Successful Sales Campaigns</a></h1>
                <p class="text-sm/relaxed tracking-wider text-gray-500">Explore a latest guideline for creating a successful online sales campaign using google adwords or facebook ads ...
                    <a href="#" class="text-primary">read more</a>
                </p>
            </div> --}}
        </div>

        <div class="flex justify-center items-center gap-2">
            <div class="flex items-center">
                <a href="javascript:void(0)" class="border border-gray-300 rounded-md text-sm tracking-wider transition-all duration-150 hover:shadow-lg focus:shadow-lg py-2 px-3"><i class="fa-solid fa-arrow-left me-2"></i> Previous</a>
            </div>

            <div class="flex items-center">
                <a href="javascript:void(0)" class="border border-gray-300 rounded-md text-sm tracking-wider transition-all duration-150 hover:shadow-lg focus:shadow-lg py-2 px-3">Next <i class="fa-solid fa-arrow-right ms-2"></i></a>
            </div>
        </div>

    </div>
</section>

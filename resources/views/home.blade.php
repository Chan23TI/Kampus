@extends('layouts.landing')

@section('title', 'Landing Page')

@section('content')
    @include('components.hero', [
        'salam' => 'Halo',
        'judul' => 'Saya Merupakan Mahasiswa Dari Program Studi Teknik Informatika.',
        'caption' => 'Sebagai mahasiswa yang mencintai coding, saya percaya bahwa coding adalah bagian dari ilmu pengetahuan
        dan menciptakan inovasi-inovasi baru.',
        'foto' => 'https://pcr/.ac.id/assets/images/pegawai/MMZ20211215073029.JPG'
    ])
    @include('components.berita')
    {{-- @include('components.services')
    @include('components.portfolio')
    @include('components.testimonials')
    @include('components.cta') --}}
@endsection



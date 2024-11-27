<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $services = [
            [
                'title' => 'UI/UX Design',
                'description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered.',
                'icon' => 'path/to/icon1.svg', // Ganti dengan path ke ikon yang sesuai
            ],
            [
                'title' => 'Product Design',
                'description' => 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary making.',
                'icon' => 'path/to/icon2.svg',
            ],
            [
                'title' => 'Frontend Development',
                'description' => 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.',
                'icon' => 'path/to/icon3.svg',
            ],
        ];

        $berita = Berita::all();
        return view('home', [
            'services' => $services,
            // Data lainnya yang ingin dikirim ke view
        ],compact('berita'));
    }

    function test() {
        $users = DB::table('users')->get();
         dd($users);

        foreach($users as $key => $value){
            echo $value->name;
        }
     }
}

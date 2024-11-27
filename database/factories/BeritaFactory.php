<?php

namespace Database\Factories;


use App\Models\Berita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BeritaPerintah>
 */
class BeritaFactory extends Factory
{
    /**
     * Definisikan model yang digunakan oleh factory.
     *
     * @var string
     */
    protected $model = Berita::class;

    /**
     * Definisikan data default untuk factory.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence,
            'isi_berita' => $this->faker->paragraph,
            'gambar' => $this->faker->imageUrl(),
        ];
    }
}

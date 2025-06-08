<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Shortener;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $name = ucwords($this->faker->words(3, true)), // Menggunakan words agar tidak terlalu panjang
            'slug' => str($name)->slug(),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(100000, 500000),
            // short_url_key akan diisi oleh callback di bawah
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            // 1. Tentukan apakah produk ini akan memiliki short link (misal: 100% kemungkinan, yang berarti seluruhnya)
            if ($this->faker->boolean(100)) {

                // 2. Buat unique key untuk short link
                $uniqueKey = str()->random(5) . $product->id;

                // 3. Buat record baru di tabel 'shorteners'
                Shortener::create([
                    'original' => route('products.show', $product),
                    'unique_key' => $uniqueKey,
                    'short' => config('app.domain_shortener') . '/' . $uniqueKey,
                ]);

                // 4. Update kolom 'short_url_key' pada produk yang baru saja dibuat
                $product->short_url_key = $uniqueKey;
                $product->save();
            }
        });
    }
}

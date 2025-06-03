<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $platforms = ['Windows', 'macOS', 'iOS', 'Android', 'Linux'];
        $devices = ['WebKit', 'Gecko', 'Blink'];
        $deviceTypes = ['desktop', 'phone', 'tablet'];
        $browsers = ['Chrome', 'Firefox', 'Safari', 'Edge', 'Opera'];
        $referrers = ['https://google.com', 'https://twitter.com', 'https://facebook.com', null];

        // Daftar kota Indonesia dengan kode region-nya (untuk peta Highcharts)
        $locations = [
            ['city' => 'Jakarta', 'province' => 'DKI Jakarta', 'region_code' => 'id-jk'],
            ['city' => 'Bandung', 'province' => 'Jawa Barat', 'region_code' => 'id-jr'],
            ['city' => 'Surabaya', 'province' => 'Jawa Timur', 'region_code' => 'id-jt'],
            ['city' => 'Yogyakarta', 'province' => 'DI Yogyakarta', 'region_code' => 'id-yo'],
            ['city' => 'Semarang', 'province' => 'Jawa Tengah', 'region_code' => 'id-jt'],
            ['city' => 'Medan', 'province' => 'Sumatera Utara', 'region_code' => 'id-su'],
            ['city' => 'Denpasar', 'province' => 'Bali', 'region_code' => 'id-ba'],
            ['city' => 'Makassar', 'province' => 'Sulawesi Selatan', 'region_code' => 'id-sl'],
            ['city' => 'Palembang', 'province' => 'Sumatera Selatan', 'region_code' => 'id-ss'],
            ['city' => 'Banjarmasin', 'province' => 'Kalimantan Selatan', 'region_code' => 'id-ks'],
        ];

        for ($i = 0; $i < 100; $i++) {
            $loc = $locations[array_rand($locations)];

            DB::table('visitors')->insert([
                'shortener_id' => rand(1, 4),
                'ip_address' => fake()->ipv4(),
                'country' => 'Indonesia',
                'city' => $loc['city'],
                'region_code' => $loc['region_code'], // Tambahkan region code untuk mapping ke peta
                'platform' => fake()->randomElement($platforms),
                'device' => fake()->randomElement($devices),
                'device_type' => fake()->randomElement($deviceTypes),
                'browser' => fake()->randomElement($browsers),
                'referrer' => fake()->randomElement($referrers),
                'created_at' => $created = fake()->dateTimeBetween('-7 days', 'now'),
                'updated_at' => $created,
            ]);
        }
    }
}

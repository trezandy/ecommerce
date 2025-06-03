<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Agriananda Aulia',
            'email' => 'agriananda@gmail.com',
        ]);

        Role::query()->create(['name' => 'super admin']);

        User::find(1)->assignRole('super admin');

        Product::factory(12)->create();

        // $this->call([
        //     VisitorSeeder::class,
        // ]);
    }
}

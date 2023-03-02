<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    User,
    Kategori
};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Super Admin',
            'email'    => 'super_admin@gmail.com',
            'password' => bcrypt('00000000'),
            'role'     => 'super_admin'
        ]);

        Kategori::create([
            'nama_kategori' => 'Politik'
        ]);

        Kategori::create([
            'nama_kategori' => 'Kesehatan'
        ]);

        Kategori::create([
            'nama_kategori' => 'Pendidikan'
        ]);

        Kategori::create([
            'nama_kategori' => 'Ekonomi'
        ]);
    }
}

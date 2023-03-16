<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
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

        // $provinsis = json_decode(file_get_contents('https://ibnux.github.io/data-indonesia/provinsi.json'));

        // foreach ($provinsis as $key => $provinsi) {
        //     DB::table('provinsis')->insert([
        //         'id' => $provinsi->id,
        //         'nama' => $provinsi->nama,
        //     ]);
        //     $kabupatens = json_decode(file_get_contents('https://ibnux.github.io/data-indonesia/kabupaten/'. $provinsi->id .'.json'));
        //     foreach ($kabupatens as $key => $kabupaten) {
        //         DB::table('kabupatens')->insert([
        //             'id' => $kabupaten->id,
        //             'nama' => $kabupaten->nama,
        //             'provinsi_id' => $provinsi->id
        //         ]);
        //         $kecamatans = json_decode(file_get_contents('https://ibnux.github.io/data-indonesia/kecamatan/'. $kabupaten->id .'.json'));
        //         foreach ($kecamatans as $key => $kecamatan) {
        //             DB::table('kecamatans')->insert([
        //                 'id' => $kecamatan->id,
        //                 'nama' => $kecamatan->nama,
        //                 'kabupaten_id' => $kabupaten->id
        //             ]);
        //             $kelurahans = json_decode(file_get_contents('https://ibnux.github.io/data-indonesia/kelurahan/'. $kecamatan->id .'.json'));
        //             foreach ($kelurahans as $key => $kelurahan) {
        //                 DB::table('kelurahans')->insert([
        //                     'id' => $kelurahan->id,
        //                     'nama' => $kelurahan->nama,
        //                     'kecamatan_id' => $kecamatan->id
        //                 ]);
        //             }
        //         }
        //     }
        // }
    }
}

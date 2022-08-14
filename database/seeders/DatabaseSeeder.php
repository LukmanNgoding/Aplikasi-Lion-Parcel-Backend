<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('asdasd'),
            'role' => IS_ADMIN
        ]);

        \DB::table('users')->insert([
            'nama' => 'agus',
            'email' => 'agussalvatru@gmail.com',
            'password' => bcrypt('asdasd'),
            'telepon' => '085737125437',
            'jenis_kelamin' => 'Laki-Laki',
            'kota' => 'Denpasar Selatan',
            'alamat' => 'Jalan tukad irawadi',
            'role' => IS_MEMBER
        ]);

        \DB::table('tb_pengaturan')->insert([
            'whatsapp' => '+6285737125437',
            'web_lion_parcel' => 'https://lionparcel.com',
            'nama_bank_lion_parcel' => 'Bank Mandiri',
            'bank_lion_parcel' => 'Lion Parcel Tukad Pakerisan',
            'nomor_bank_lion_parcel' => 1234567890,
        ]);
    }
}

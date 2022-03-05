<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'name' => 'judul',
            'title' => 'Judul',
            'text' => 'PASAR NUSANTARA'
        ]);

        DB::table('settings')->insert([
            'name' => 'sub_judul',
            'title' => 'Sub Judul',
            'text' => 'SOLUSI MASALAH ANDA'
        ]);

        DB::table('settings')->insert([
            'name' => 'open_order',
            'title' => 'Keterangan Jam Kerja',
            'text' => 'Buka Senin - Jumat Jam 09.00 - 17.30 , Sabtu jam 09.00 - 14.00 . Minggu & Hari Besar Tutup'
        ]);

        DB::table('settings')->insert([
            'name' => 'text_marquee',
            'title' => 'Keterangan Bergerak',
            'text' => 'SELAMAT DATANG DI PASAR NUSANTARA | SELAMAT BERBELANJA'
        ]);

        DB::table('settings')->insert([
            'name' => 'navbar_kanan',
            'title' => 'Keterangan Navbar Kanan',
            'text' => 'Selamat berbelanja, Shopper!'
        ]);

        DB::table('settings')->insert([
            'name' => 'facebook',
            'title' => 'Link Facebook',
            'text' => 'https://www.facebook.com/'
        ]);

        DB::table('settings')->insert([
            'name' => 'instagram',
            'title' => 'Link Instagram',
            'text' => 'https://www.instagram.com/'
        ]);

        DB::table('settings')->insert([
            'name' => 'whatsapp',
            'title' => 'No WhatsApp',
            'text' => '085702202129'
        ]);

        DB::table('settings')->insert([
            'name' => 'footer',
            'title' => 'Footer',
            'text' => 'Dibuat Oleh Pasar Nusantara'
        ]);
    }
}

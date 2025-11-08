<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            // --- Data Admin ---
            [
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Admin',
                'sekolah' => null, 
            ],
            // --- Data Siswa ---
            [
                'nama' => 'A. KHOIRUL PRATAMA',
                'email' => 'a.khoirul.pratama@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'AHMAD FIKRY AZZAIN',
                'email' => 'ahmad.azzain@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'AJENG ULIN NI\'MAH',
                'email' => 'ajeng.ni\'mah@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'ANATASYA DWI KISTIA AURA',
                'email' => 'anastasya.aura@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'ARFIAN ANANDA PUTRA',
                'email' => 'arfian.putra@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'AVRIL NAJWA AZIZAH',
                'email' => 'avril.azizah@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'DEWINTA AYUNDHA PRAMESWARI',
                'email' => 'dewinta.prameswari@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'FAHMA FITRI ANISA',
                'email' => 'fahma.anisa@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'HAVIS NOUR AZIZAH',
                'email' => 'havis.azizah@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'ISNAINI PURNANINGSIH',
                'email' => 'isnaini.purnaningsih@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'JIHO ATVIAN ARDIANSAH',
                'email' => 'jiho.ardiansah@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'KHARISMATRI RAHMADHANI',
                'email' => 'kharismatri.rahmadhani@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'M. RAFIF NASHRULLAH',
                'email' => 'm.nashrullah@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'MERINDA PUTRI AGUSTIANIK',
                'email' => 'merinda.agustianik@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'MOCH. AFFANDI MUCHTAR',
                'email' => 'moch.muchtar@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'MOCH. FAUZANU H.S',
                'email' => 'moch.h.s@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'MUHAMMAD BASYAR MARZUKI',
                'email' => 'muhammad.marzuki@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'NAILA SAIROTIL ULA',
                'email' => 'naila.ula@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'NOOR CHUMAEDA R.',
                'email' => 'noor.r@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'RENI AYU WIHENDRA',
                'email' => 'reni.wihendra@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'RIZKI PUTRA PRATAMA',
                'email' => 'rizki.pratama@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'SAKTIAWAN ADI ROZAN',
                'email' => 'saktiawan.rozan@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'SILVA LARASATI',
                'email' => 'silva.larasati@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
            [
                'nama' => 'UQI NUR HIDAYATI',
                'email' => 'uqi.hidayati@gmail.com',
                'password_raw' => '12345678',
                'role' => 'Siswa',
                'sekolah' => 'MAN 1 Kediri',
            ],
        ];

        $processedUsers = array_map(function ($user) {
            return [
                'nama' => $user['nama'],
                'email' => $user['email'],
                'password' => Hash::make($user['password_raw']),
                'role' => $user['role'],
                'sekolah' => $user['sekolah'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }, $users);
        DB::table('user')->insert($processedUsers);
    }
}
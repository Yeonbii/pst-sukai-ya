<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Chart;
use App\Models\Option;
use App\Models\Part;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'  => 'Admin',
            'username'  => 'admin',
            'password' => bcrypt('123'),
            'email' => 'admin@gmail.com',
            'no_wa' => '081234123412',
            'no_telp' => '081234123412'
        ]);

        Part::create([
            'name' => 'Bagian Identitas',
            'code' => 'i'
            // i --> identity
        ]);
        
        Part::create([
            'name' => 'Bagian Layanan',
            'code' => 's'
            // s --> service
        ]);

        Part::create([
            'name' => 'Bagian Nilai Pelayanan',
            'code' => 'sv'
            // sv --> service value
        ]);

        Part::create([
            'name' => 'Bagian Rating Pelayanan',
            'code' => 'sr'
            // sr --> service rating
        ]);

        Part::create([
            'name' => 'Bagian Feedback',
            'code' => 'f'
            // f --> feedback
        ]);

        Part::create([
            'name' => 'Bagian Lain-lain',
            'code' => 'o'
            // o --> other
        ]);

        // BAGIAN IDENTITAS START

        // Bagian Identitas - 1
        Question::create([
            'part_id' => Part::where('code', 'i')->value('id'),
            'no' => 1,
            'text' => 'Nama lengkap',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '1',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '1'
        ]);

        // Bagian Identitas - 2
        Question::create([
            'part_id' => Part::where('code', 'i')->value('id'),
            'no' => 2,
            'text' => 'Jenis kelamin',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '5',
            'maks_char' => '0',
            'option_number' => '2',
            'has_chart' => '0',
            'is_locked' => '1'
        ]);

        // Bagian Identitas - 2 : Pilihan 1
        Option::create([
            'question_id' => Question::where('text', 'Jenis kelamin')->value('id'),
            'no' => 1,
            'text' => 'Laki-laki',
            'value' => 'Laki-laki'
        ]);

        // Bagian Identitas - 2 :Pilihan 2
        Option::create([
            'question_id' => Question::where('text', 'Jenis kelamin')->value('id'),
            'no' => 2,
            'text' => 'Perempuan',
            'value' => 'Perempuan'
        ]);

        // Bagian Identitas - 3
        Question::create([
            'part_id' => Part::where('code', 'i')->value('id'),
            'no' => 3,
            'text' => 'Pendidikan yang ditamatkan',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '5',
            'maks_char' => '0',
            'option_number' => '5',
            'has_chart' => '1',
            'is_locked' => '0'
        ]);

        // Bagian Identitas - 3 :  Pilihan 1
        Option::create([
            'question_id' => Question::where('text', 'Pendidikan yang ditamatkan')->value('id'),
            'no' => 1,
            'text' => '≤ SMP/sederajat',
            'value' => '≤ SMP/sederajat'
        ]);
        
        // Bagian Identitas - 3 :  Pilihan 2
        Option::create([
            'question_id' => Question::where('text', 'Pendidikan yang ditamatkan')->value('id'),
            'no' => 2,
            'text' => 'SMA/sederajat',
            'value' => 'SMA/sederajat'
        ]);

        // Bagian Identitas - 3 :  Pilihan 3
        Option::create([
            'question_id' => Question::where('text', 'Pendidikan yang ditamatkan')->value('id'),
            'no' => 3,
            'text' => 'DI/DII/DIII',
            'value' => 'DI/DII/DIII'
        ]);

        // Bagian Identitas - 3 :  Pilihan 4
        Option::create([
            'question_id' => Question::where('text', 'Pendidikan yang ditamatkan')->value('id'),
            'no' => 4,
            'text' => 'DIV/S1',
            'value' => 'DIV/S1'
        ]);

        // Bagian Identitas - 3 :  Pilihan 5
        Option::create([
            'question_id' => Question::where('text', 'Pendidikan yang ditamatkan')->value('id'),
            'no' => 5,
            'text' => 'S2/S3',
            'value' => 'S2/S3'
        ]);

        // Bagian Identitas - 3 : Chart
        Chart::create([
            'question_id' => Question::where('text', 'Pendidikan yang ditamatkan')->value('id'),
            'no' => 1,
            'show' => '1'
        ]);

        // Bagian Identitas - 4
        Question::create([
            'part_id' => Part::where('code', 'i')->value('id'),
            'no' => 4,
            'text' => 'Pekerjaan',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '1',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // Bagian Identitas - 5
        Question::create([
            'part_id' => Part::where('code', 'i')->value('id'),
            'no' => 5,
            'text' => 'Nomor HP Aktif',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '4',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // Bagian Identitas - 6
        Question::create([
            'part_id' => Part::where('code', 'i')->value('id'),
            'no' => 6,
            'text' => 'Nomor WA Aktif',
            'is_required' => '0',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '4',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // Bagian Identitas - 7
        Question::create([
            'part_id' => Part::where('code', 'i')->value('id'),
            'no' => 7,
            'text' => 'Email',
            'is_required' => '0',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '1',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // BAGIAN IDENTITAS END

        // BAGIAN LAYANAN START

        // Bagian Layanan - 1
        Question::create([
            'part_id' => Part::where('code', 's')->value('id'),
            'no' => 1,
            'text' => 'Tanggal Pelayanan diterima',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '3',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '1'
        ]);

        // Bagian Layanan - 2
        Question::create([
            'part_id' => Part::where('code', 's')->value('id'),
            'no' => 2,
            'text' => 'Jenis Layanan',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '5',
            'maks_char' => '0',
            'option_number' => '4',
            'has_chart' => '1',
            'is_locked' => '0'
        ]);

        // Bagian Layanan - 2 :  Pilihan 1
        Option::create([
            'question_id' => Question::where('text', 'Jenis Layanan')->value('id'),
            'no' => 1,
            'text' => 'Perpustakaan',
            'value' => 'Perpustakaan'
        ]);

        // Bagian Layanan - 2 :  Pilihan 2
        Option::create([
            'question_id' => Question::where('text', 'Jenis Layanan')->value('id'),
            'no' => 2,
            'text' => 'Konsultasi',
            'value' => 'Konsultasi'
        ]);

        // Bagian Layanan - 2 :  Pilihan 3
        Option::create([
            'question_id' => Question::where('text', 'Jenis Layanan')->value('id'),
            'no' => 3,
            'text' => 'Rekomendasi',
            'value' => 'Rekomendasi'
        ]);

        // Bagian Layanan - 2 :  Pilihan 4
        Option::create([
            'question_id' => Question::where('text', 'Jenis Layanan')->value('id'),
            'no' => 4,
            'text' => 'Penjualan',
            'value' => 'Penjualan'
        ]);

        // Bagian Layanan - 2 : Chart
        Chart::create([
            'question_id' => Question::where('text', 'Jenis Layanan')->value('id'),
            'no' => 2,
            'show' => '1'
        ]);

        // Bagian Layanan - 3
        Question::create([
            'part_id' => Part::where('code', 's')->value('id'),
            'no' => 3,
            'text' => 'Media yang digunakan',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '5',
            'maks_char' => '0',
            'option_number' => '11',
            'has_chart' => '1',
            'is_locked' => '0'
        ]);

        // Bagian Layanan - 3 :  Pilihan 1
        Option::create([
            'question_id' => Question::where('text', 'Media yang digunakan')->value('id'),
            'no' => 1,
            'text' => 'Datang Langsung ke PST BPS Kab. HSU',
            'value' => 'Datang Langsung ke PST BPS Kab. HSU'
        ]);

        // Bagian Layanan - 3 :  Pilihan 2
        Option::create([
            'question_id' => Question::where('text', 'Media yang digunakan')->value('id'),
            'no' => 2,
            'text' => 'Whatsapp message',
            'value' => 'Whatsapp message'
        ]);

        // Bagian Layanan - 3 :  Pilihan 3
        Option::create([
            'question_id' => Question::where('text', 'Media yang digunakan')->value('id'),
            'no' => 3,
            'text' => 'Website BPS (link*http://hulusungaiutarakab.bps.go.id*link)',
            'value' => 'Website BPS (link*http://hulusungaiutarakab.bps.go.id*link)'
        ]);

        // Bagian Layanan - 3 :  Pilihan 4
        Option::create([
            'question_id' => Question::where('text', 'Media yang digunakan')->value('id'),
            'no' => 4,
            'text' => 'Aplikasi Allstats BPS',
            'value' => 'Aplikasi Allstats BPS'
        ]);

        // Bagian Layanan - 3 :  Pilihan 5
        Option::create([
            'question_id' => Question::where('text', 'Media yang digunakan')->value('id'),
            'no' => 5,
            'text' => 'Email',
            'value' => 'Email'
        ]);

        // Bagian Layanan - 3 :  Pilihan 6
        Option::create([
            'question_id' => Question::where('text', 'Media yang digunakan')->value('id'),
            'no' => 6,
            'text' => 'Romantik Online (link*http://romantik.bps.go.id*link)',
            'value' => 'Romantik Online (link*http://romantik.bps.go.id*link)'
        ]);

        // Bagian Layanan - 3 :  Pilihan 7
        Option::create([
            'question_id' => Question::where('text', 'Media yang digunakan')->value('id'),
            'no' => 7,
            'text' => 'Surat',
            'value' => 'Surat'
        ]);

        // Bagian Layanan - 3 :  Pilihan 8
        Option::create([
            'question_id' => Question::where('text', 'Media yang digunakan')->value('id'),
            'no' => 8,
            'text' => 'Website PST (link*pst.bps.go.id*link)',
            'value' => 'Website PST (link*pst.bps.go.id*link)'
        ]);

        // Bagian Layanan - 3 :  Pilihan 9
        Option::create([
            'question_id' => Question::where('text', 'Media yang digunakan')->value('id'),
            'no' => 9,
            'text' => 'Portal satu data HSU (link*http://data.hsu.go.id*link)',
            'value' => 'Portal satu data HSU (link*http://data.hsu.go.id*link)'
        ]);

        // Bagian Layanan - 3 :  Pilihan 10
        Option::create([
            'question_id' => Question::where('text', 'Media yang digunakan')->value('id'),
            'no' => 10,
            'text' => 'Acil bungas di Perpustakaan STIPER Amuntai',
            'value' => 'Acil bungas di Perpustakaan STIPER Amuntai'
        ]);

        // Bagian Layanan - 3 :  Pilihan 11
        Option::create([
            'question_id' => Question::where('text', 'Media yang digunakan')->value('id'),
            'no' => 11,
            'text' => 'Yang lain',
            'value' => 'Yang lain'
        ]);

        // Bagian Layanan - 3 : Chart
        Chart::create([
            'question_id' => Question::where('text', 'Media yang digunakan')->value('id'),
            'no' => 3,
            'show' => '1'
        ]);

        // Bagian Layanan - 4
        Question::create([
            'part_id' => Part::where('code', 's')->value('id'),
            'no' => 4,
            'text' => 'Petugas yang melayani',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '5',
            'maks_char' => '0',
            'option_number' => '12',
            'has_chart' => '1',
            'is_locked' => '0'
        ]);

        // Bagian Layanan - 4 :  Pilihan 1
        Option::create([
            'question_id' => Question::where('text', 'Petugas yang melayani')->value('id'),
            'no' => 1,
            'text' => 'Tidak Datang Langsung ke PST BPS Kab. HSU',
            'value' => 'Tidak Datang Langsung ke PST BPS Kab. HSU'
        ]);

        // Bagian Layanan - 4 :  Pilihan 2
        Option::create([
            'question_id' => Question::where('text', 'Petugas yang melayani')->value('id'),
            'no' => 2,
            'text' => 'Masdani',
            'value' => 'Masdani'
        ]);

        // Bagian Layanan - 4 :  Pilihan 3
        Option::create([
            'question_id' => Question::where('text', 'Petugas yang melayani')->value('id'),
            'no' => 3,
            'text' => 'Eko W. L.',
            'value' => 'Eko W. L.'
        ]);

        // Bagian Layanan - 4 :  Pilihan 4
        Option::create([
            'question_id' => Question::where('text', 'Petugas yang melayani')->value('id'),
            'no' => 4,
            'text' => 'M. Adi W. K.',
            'value' => 'M. Adi W. K.'
        ]);

        // Bagian Layanan - 4 :  Pilihan 5
        Option::create([
            'question_id' => Question::where('text', 'Petugas yang melayani')->value('id'),
            'no' => 5,
            'text' => 'Oktaviani',
            'value' => 'Oktaviani'
        ]);

        // Bagian Layanan - 4 :  Pilihan 6
        Option::create([
            'question_id' => Question::where('text', 'Petugas yang melayani')->value('id'),
            'no' => 6,
            'text' => 'Hanif Y. R.',
            'value' => 'Hanif Y. R.'
        ]);

        // Bagian Layanan - 4 :  Pilihan 7
        Option::create([
            'question_id' => Question::where('text', 'Petugas yang melayani')->value('id'),
            'no' => 7,
            'text' => 'M. Imam S.',
            'value' => 'M. Imam S.'
        ]);

        // Bagian Layanan - 4 :  Pilihan 8
        Option::create([
            'question_id' => Question::where('text', 'Petugas yang melayani')->value('id'),
            'no' => 8,
            'text' => 'Safrian F.',
            'value' => 'Safrian F.'
        ]);

        // Bagian Layanan - 4 :  Pilihan 9
        Option::create([
            'question_id' => Question::where('text', 'Petugas yang melayani')->value('id'),
            'no' => 9,
            'text' => 'Ghytsa A. J.',
            'value' => 'Ghytsa A. J.'
        ]);

        // Bagian Layanan - 4 :  Pilihan 10
        Option::create([
            'question_id' => Question::where('text', 'Petugas yang melayani')->value('id'),
            'no' => 10,
            'text' => 'Faizal R.',
            'value' => 'Faizal R.'
        ]);

        // Bagian Layanan - 4 :  Pilihan 11
        Option::create([
            'question_id' => Question::where('text', 'Petugas yang melayani')->value('id'),
            'no' => 11,
            'text' => 'Ariq',
            'value' => 'Ariq'
        ]);

        // Bagian Layanan - 4 :  Pilihan 12
        Option::create([
            'question_id' => Question::where('text', 'Petugas yang melayani')->value('id'),
            'no' => 12,
            'text' => 'Ridha',
            'value' => 'Ridha'
        ]);

        // Bagian Layanan - 4 : Chart
        Chart::create([
            'question_id' => Question::where('text', 'Petugas yang melayani')->value('id'),
            'no' => 4,
            'show' => '1'
        ]);



        // BAGIAN LAYANAN END



        // BAGIAN NILAI PELAYANAN START



        // Bagian Nilai Pelayanan - 1
        Question::create([
            'part_id' => Part::where('code', 'sv')->value('id'),
            'no' => 1,
            'text' => 'Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?',
            'is_required' => '1',
            'need_note' => '1',
            'note' => 'Persyaratan pelayanan dapat dilihat pada poster di ruang pelayanan atau di link*https://ppid.bps.go.id/app/konten/6308/Standar-Layanan-Informasi-Publik.html*link',
            'input_type' => '6',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // Bagian Nilai Pelayanan - 1 :  Pilihan 1
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?')->value('id'),
            'no' => 1,
            'text' => 'Tidak Sesuai',
            'value' => '1'
        ]);

        // Bagian Nilai Pelayanan - 1 :  Pilihan 2
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?')->value('id'),
            'no' => 2,
            'text' => 'Kurang Sesuai',
            'value' => '2'
        ]);

        // Bagian Nilai Pelayanan - 1 :  Pilihan 3
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?')->value('id'),
            'no' => 3,
            'text' => 'Sesuai',
            'value' => '3'
        ]);

        // Bagian Nilai Pelayanan - 1 :  Pilihan 4
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?')->value('id'),
            'no' => 4,
            'text' => 'Sangat Sesuai',
            'value' => '4'
        ]);



        // Bagian Nilai Pelayanan - 2
        Question::create([
            'part_id' => Part::where('code', 'sv')->value('id'),
            'no' => 2,
            'text' => 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini?',
            'is_required' => '1',
            'need_note' => '1',
            'note' => 'Prosedur pelayanan dapat dilihat pada poster di ruang pelayanan atau di link*https://ppid.bps.go.id/app/konten/6308/Standar-Layanan-Informasi-Publik.html*link',
            'input_type' => '6',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // Bagian Nilai Pelayanan - 2 :  Pilihan 1
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini?')->value('id'),
            'no' => 1,
            'text' => 'Tidak Mudah',
            'value' => '1'
        ]);

        // Bagian Nilai Pelayanan - 2 :  Pilihan 2
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini?')->value('id'),
            'no' => 2,
            'text' => 'Kurang Mudah',
            'value' => '2'
        ]);

        // Bagian Nilai Pelayanan - 2 :  Pilihan 3
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini?')->value('id'),
            'no' => 3,
            'text' => 'Mudah',
            'value' => '3'
        ]);

        // Bagian Nilai Pelayanan - 2 :  Pilihan 4
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini?')->value('id'),
            'no' => 4,
            'text' => 'Sangat Mudah',
            'value' => '4'
        ]);



        // Bagian Nilai Pelayanan - 3
        Question::create([
            'part_id' => Part::where('code', 'sv')->value('id'),
            'no' => 3,
            'text' => 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan?',
            'is_required' => '1',
            'need_note' => '1',
            'note' => 'Jangka waktu pelayanan menurut jenis layanan dan medianya, dapat dilihat pada poster di ruang pelayanan atau di link*https://ppid.bps.go.id/app/konten/6308/Standar-Layanan-Informasi-Publik.html*link',
            'input_type' => '6',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // Bagian Nilai Pelayanan - 3 :  Pilihan 1
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan?')->value('id'),
            'no' => 1,
            'text' => 'Tidak Cepat',
            'value' => '1'
        ]);

        // Bagian Nilai Pelayanan - 3 :  Pilihan 2
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan?')->value('id'),
            'no' => 2,
            'text' => 'Kurang Cepat',
            'value' => '2'
        ]);

        // Bagian Nilai Pelayanan - 3 :  Pilihan 3
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan?')->value('id'),
            'no' => 3,
            'text' => 'Cepat',
            'value' => '3'
        ]);

        // Bagian Nilai Pelayanan - 3 :  Pilihan 4
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan?')->value('id'),
            'no' => 4,
            'text' => 'Sangat Cepat',
            'value' => '4'
        ]);
        


        // Bagian Nilai Pelayanan - 4
        Question::create([
            'part_id' => Part::where('code', 'sv')->value('id'),
            'no' => 4,
            'text' => 'Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan?',
            'is_required' => '1',
            'need_note' => '1',
            'note' => 'Biaya pelayanan di PST BPS Kab. Hulu Sungai Utara gratis, kecuali pelayanan yang telah ditetapkan sebagai Penerimaan Negara Bukan Pajak (PNBP). Biaya pelayanan dapat dilihat pada poster di ruang pelayanan atau di link*https://ppid.bps.go.id/app/konten/6308/Standar-Layanan-Informasi-Publik.html*link',
            'input_type' => '6',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // Bagian Nilai Pelayanan - 4 :  Pilihan 1
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan?')->value('id'),
            'no' => 1,
            'text' => 'Sangat Mahal',
            'value' => '1'
        ]);

        // Bagian Nilai Pelayanan - 4 :  Pilihan 2
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan?')->value('id'),
            'no' => 2,
            'text' => 'Cukup Mahal',
            'value' => '2'
        ]);

        // Bagian Nilai Pelayanan - 4 :  Pilihan 3
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan?')->value('id'),
            'no' => 3,
            'text' => 'Murah',
            'value' => '3'
        ]);

        // Bagian Nilai Pelayanan - 4 :  Pilihan 4
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan?')->value('id'),
            'no' => 4,
            'text' => 'Gratis',
            'value' => '4'
        ]);


        // Bagian Nilai Pelayanan - 5
        Question::create([
            'part_id' => Part::where('code', 'sv')->value('id'),
            'no' => 5,
            'text' => 'Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan?',
            'is_required' => '1',
            'need_note' => '1',
            'note' => 'Standar pelayanan dapat dilihat pada poster di ruang pelayanan atau di link*https://ppid.bps.go.id/app/konten/6308/Standar-Layanan-Informasi-Publik.html*link',
            'input_type' => '6',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // Bagian Nilai Pelayanan - 5 :  Pilihan 1
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan?')->value('id'),
            'no' => 1,
            'text' => 'Tidak Sesuai',
            'value' => '1'
        ]);

        // Bagian Nilai Pelayanan - 5 :  Pilihan 2
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan?')->value('id'),
            'no' => 2,
            'text' => 'Kurang Sesuai',
            'value' => '2'
        ]);

        // Bagian Nilai Pelayanan - 5 :  Pilihan 3
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan?')->value('id'),
            'no' => 3,
            'text' => 'Sesuai',
            'value' => '3'
        ]);

        // Bagian Nilai Pelayanan - 5 :  Pilihan 4
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan?')->value('id'),
            'no' => 4,
            'text' => 'Sangat Sesuai',
            'value' => '4'
        ]);



        // Bagian Nilai Pelayanan - 6
        Question::create([
            'part_id' => Part::where('code', 'sv')->value('id'),
            'no' => 6,
            'text' => 'Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan?',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '6',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // Bagian Nilai Pelayanan - 6 :  Pilihan 1
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan?')->value('id'),
            'no' => 1,
            'text' => 'Tidak Kompeten',
            'value' => '1'
        ]);

        // Bagian Nilai Pelayanan - 6 :  Pilihan 2
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan?')->value('id'),
            'no' => 2,
            'text' => 'Kurang Kompeten',
            'value' => '2'
        ]);

        // Bagian Nilai Pelayanan - 6 :  Pilihan 3
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan?')->value('id'),
            'no' => 3,
            'text' => 'Kompeten',
            'value' => '3'
        ]);

        // Bagian Nilai Pelayanan - 6 :  Pilihan 4
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan?')->value('id'),
            'no' => 4,
            'text' => 'Sangat Kompeten',
            'value' => '4'
        ]);



        // Bagian Nilai Pelayanan - 7
        Question::create([
            'part_id' => Part::where('code', 'sv')->value('id'),
            'no' => 7,
            'text' => 'Bagamana pendapat saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan?',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '6',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // Bagian Nilai Pelayanan - 7 :  Pilihan 1
        Option::create([
            'question_id' => Question::where('text', 'Bagamana pendapat saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan?')->value('id'),
            'no' => 1,
            'text' => 'Tidak Sopan dan Ramah',
            'value' => '1'
        ]);

        // Bagian Nilai Pelayanan - 7 :  Pilihan 2
        Option::create([
            'question_id' => Question::where('text', 'Bagamana pendapat saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan?')->value('id'),
            'no' => 2,
            'text' => 'Kurang Sopan dan Ramah',
            'value' => '2'
        ]);

        // Bagian Nilai Pelayanan - 7 :  Pilihan 3
        Option::create([
            'question_id' => Question::where('text', 'Bagamana pendapat saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan?')->value('id'),
            'no' => 3,
            'text' => 'Sopan dan Ramah',
            'value' => '3'
        ]);

        // Bagian Nilai Pelayanan - 7 :  Pilihan 4
        Option::create([
            'question_id' => Question::where('text', 'Bagamana pendapat saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan?')->value('id'),
            'no' => 4,
            'text' => 'Sangat Sopan dan Ramah',
            'value' => '4'
        ]);



        // Bagian Nilai Pelayanan - 8
        Question::create([
            'part_id' => Part::where('code', 'sv')->value('id'),
            'no' => 8,
            'text' => 'Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana pelayanan?',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '6',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // Bagian Nilai Pelayanan - 8 :  Pilihan 1
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana pelayanan?')->value('id'),
            'no' => 1,
            'text' => 'Buruk',
            'value' => '1'
        ]);

        // Bagian Nilai Pelayanan - 8 :  Pilihan 2
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana pelayanan?')->value('id'),
            'no' => 2,
            'text' => 'Cukup',
            'value' => '2'
        ]);

        // Bagian Nilai Pelayanan - 8 :  Pilihan 3
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana pelayanan?')->value('id'),
            'no' => 3,
            'text' => 'Baik',
            'value' => '3'
        ]);

        // Bagian Nilai Pelayanan - 8 :  Pilihan 4
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana pelayanan?')->value('id'),
            'no' => 4,
            'text' => 'Sangat Baik',
            'value' => '4'
        ]);



        // Bagian Nilai Pelayanan - 9
        Question::create([
            'part_id' => Part::where('code', 'sv')->value('id'),
            'no' => 9,
            'text' => 'Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan?',
            'is_required' => '1',
            'need_note' => '1',
            'note' => 'Pengaduan dapat dilakukan melalui kotak saran dan pengaduan, email pengaduan6308@bps.go.id, portal layanan BPS HSU di link*http://linktr.ee/bpshsu*link , atau melalui panggilan telepon pada nomor 0812 5068 578',
            'input_type' => '6',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // Bagian Nilai Pelayanan - 9 :  Pilihan 1
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan?')->value('id'),
            'no' => 1,
            'text' => 'Tidak ada',
            'value' => '1'
        ]);

        // Bagian Nilai Pelayanan - 9 :  Pilihan 2
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan?')->value('id'),
            'no' => 2,
            'text' => 'Ada tetapi tidak berfungsi',
            'value' => '2'
        ]);

        // Bagian Nilai Pelayanan - 9 :  Pilihan 3
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan?')->value('id'),
            'no' => 3,
            'text' => 'Berfungsi kurang maksimal',
            'value' => '3'
        ]);

        // Bagian Nilai Pelayanan - 9 :  Pilihan 4
        Option::create([
            'question_id' => Question::where('text', 'Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan?')->value('id'),
            'no' => 4,
            'text' => 'Dikelola dengan baik',
            'value' => '4'
        ]);


        // BAGIAN NILAI PELAYANAN END



        // BAGIAN RATING PELAYANAN START


        // Bagian Rating Pelayanan - 1
        Question::create([
            'part_id' => Part::where('code', 'sr')->value('id'),
            'no' => 1,
            'text' => 'Berikan penilaian pelayanan secara umum yang dilakukan petugas/aplikasi (1= sangat buruk, 10=sangat baik)',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '8',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);
        
        

        // BAGIAN RATING PELAYANAN END



        // BAGIAN FEEDBACK START



        // Bagian Feedback - 1
        Question::create([
            'part_id' => Part::where('code', 'f')->value('id'),
            'no' => 1,
            'text' => 'Tuliskan komentar, kritik, maupun saran untuk perbaikan layanan selanjutnya sebagai bahan evaluasi',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '9',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);



        // BAGIAN FEEDBACK END



        // BAGIAN LAIN-LAIN START



        // Bagian Lain-lain - 1
        Question::create([
            'part_id' => Part::where('code', 'o')->value('id'),
            'no' => 1,
            'text' => 'Testimoni pian dalam menerima pelayanan',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '9',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // Bagian Lain-lain - 2
        Question::create([
            'part_id' => Part::where('code', 'o')->value('id'),
            'no' => 2,
            'text' => 'Apakah bersedia dihubungi jika terpilih menjadi sampel survei kepuasan sejenis?',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '7',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // Bagian Lain-lain - 3
        Question::create([
            'part_id' => Part::where('code', 'o')->value('id'),
            'no' => 3,
            'text' => 'Apakah bersedia diberikan informasi  melalui WA/Email mengenai Rilis Data Statistik?',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '7',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // Bagian Lain-lain - 4
        Question::create([
            'part_id' => Part::where('code', 'o')->value('id'),
            'no' => 4,
            'text' => 'Apakah bersedia diberikan informasi  melalui WA/Email mengenai Rilis Buku/Publikasi Statistik?',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '7',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);

        // Bagian Lain-lain - 5
        Question::create([
            'part_id' => Part::where('code', 'o')->value('id'),
            'no' => 5,
            'text' => 'Apakah bersedia diberikan informasi  melalui WA/Email mengenai Informasi/Berita Kegiatan?',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'input_type' => '7',
            'maks_char' => '0',
            'option_number' => '0',
            'has_chart' => '0',
            'is_locked' => '0'
        ]);


    }
}

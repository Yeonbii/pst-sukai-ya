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
            'is_triggered' => '0',
            'input_type' => '1',
            'maks_char' => '0',
            'has_other' => '0',
            'option_number' => '0',
            'has_chart' => '0'
        ]);

        // Bagian Identitas - 2
        Question::create([
            'part_id' => Part::where('code', 'i')->value('id'),
            'no' => 2,
            'text' => 'Jenis kelamin',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'is_triggered' => '0',
            'input_type' => '5',
            'maks_char' => '0',
            'has_other' => '0',
            'option_number' => '2',
            'has_chart' => '0'
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
            'is_triggered' => '0',
            'input_type' => '5',
            'maks_char' => '0',
            'has_other' => '0',
            'option_number' => '5',
            'has_chart' => '1'
        ]);

        // Bagian Identitas - 3 :  Pilihan 1
        Option::create([
            'question_id' => Question::where('text', 'Pendidikan yang ditamatkan')->value('id'),
            'no' => 1,
            'text' => '<= SMP/sederajat',
            'value' => '<= SMP/sederajat'
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
            'order' => 1,
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
            'is_triggered' => '0',
            'input_type' => '1',
            'maks_char' => '0',
            'has_other' => '0',
            'option_number' => '0',
            'has_chart' => '0'
        ]);

        // Bagian Identitas - 5
        Question::create([
            'part_id' => Part::where('code', 'i')->value('id'),
            'no' => 5,
            'text' => 'Nomor HP Aktif',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'is_triggered' => '0',
            'input_type' => '4',
            'maks_char' => '0',
            'has_other' => '0',
            'option_number' => '0',
            'has_chart' => '0'
        ]);

        // Bagian Identitas - 6
        Question::create([
            'part_id' => Part::where('code', 'i')->value('id'),
            'no' => 6,
            'text' => 'Nomor WA Aktif',
            'is_required' => '0',
            'need_note' => '0',
            'note' => '-',
            'is_triggered' => '0',
            'input_type' => '4',
            'maks_char' => '0',
            'has_other' => '0',
            'option_number' => '0',
            'has_chart' => '0'
        ]);

        // Bagian Identitas - 7
        Question::create([
            'part_id' => Part::where('code', 'i')->value('id'),
            'no' => 7,
            'text' => 'Email',
            'is_required' => '0',
            'need_note' => '0',
            'note' => '-',
            'is_triggered' => '0',
            'input_type' => '1',
            'maks_char' => '0',
            'has_other' => '0',
            'option_number' => '0',
            'has_chart' => '0'
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
            'is_triggered' => '0',
            'input_type' => '3',
            'maks_char' => '0',
            'has_other' => '0',
            'option_number' => '0',
            'has_chart' => '0'
        ]);

        // Bagian Layanan - 2
        Question::create([
            'part_id' => Part::where('code', 's')->value('id'),
            'no' => 2,
            'text' => 'Jenis Layanan',
            'is_required' => '1',
            'need_note' => '0',
            'note' => '-',
            'is_triggered' => '0',
            'input_type' => '5',
            'maks_char' => '0',
            'has_other' => '0',
            'option_number' => '4',
            'has_chart' => '1'
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
            'order' => 2,
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
            'is_triggered' => '0',
            'input_type' => '5',
            'maks_char' => '0',
            'has_other' => '1',
            'option_number' => '11',
            'has_chart' => '1'
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
            'value' => 'Other'
        ]);

        // Bagian Layanan - 3 : Chart
        Chart::create([
            'question_id' => Question::where('text', 'Media yang digunakan')->value('id'),
            'order' => 3,
            'show' => '1'
        ]);

        // BAGIAN LAYANAN END
        
    }
}

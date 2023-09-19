<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Pertanian, Perkebunan, dan Peternakan',
                'description' => 'Tanaman Pangan (Padi, Jagung, Kedelai, dll.)\nPerkebunan (Karet, Kelapa Sawit, Kopi, Teh, dll.)\nPeternakan (Ayam, Sapi, Kambing, dll.)'
            ],
            [
                'name' => 'Perdagangan',
                'description' => 'Toko Retail (Toko Baju, Toko Elektronik, dll.)\nGrosir\nPasar Tradisional'
            ],
            [
                'name' => 'Manufaktur',
                'description' => 'Industri Makanan dan Minuman\nIndustri Tekstil dan Pakaian\nIndustri Elektronik\nIndustri Otomotif\nIndustri Kimia'
            ],
            [
                'name' => 'Jasa',
                'description' => 'Jasa Keuangan (Perbankan, Asuransi, dll.)\nJasa Kesehatan (Rumah Sakit, Klinik, dll.)\nJasa Pendidikan (Sekolah, Kursus, dll.)\nJasa Teknologi Informasi dan Komunikasi (TIK)\nJasa Konsultan'
            ],
            [
                'name' => 'Pariwisata dan Perhotelan',
                'description' => 'Hotel dan Penginapan\nRestoran dan Kafe\nTempat Wisata'
            ],
            [
                'name' => 'Konstruksi dan Properti',
                'description' => 'Konstruksi Bangunan\nPengembang Properti\nAgensi Properti'
            ],
            [
                'name' => 'Transportasi dan Logistik',
                'description' => 'Perusahaan Logistik\nJasa Angkutan Darat\nMaskapai Penerbangan'
            ],
            [
                'name' => 'Energi dan Sumber Daya Alam',
                'description' => 'Pertambangan\nEnergi Listrik\nEnergi Terbarukan'
            ],
            [
                'name' => 'Kreatif dan Hiburan',
                'description' => 'Seni dan Budaya\nIndustri Film dan Musik\nMedia dan Periklanan'
            ],
            [
                'name' => 'Teknologi dan Startup',
                'description' => 'Perusahaan Teknologi\nStartup Teknologi'
            ],
            [
                'name' => 'Pemerintahan dan Organisasi Non-Profit',
                'description' => 'Instansi Pemerintah\nOrganisasi Amal dan Sosial'
            ],
            [
                'name' => 'Pendidikan',
                'description' => 'Sekolah Dasar dan Menengah\nPerguruan Tinggi dan Universitas\nLembaga Pelatihan'
            ],
            [
                'name' => 'Kesehatan dan Kedokteran',
                'description' => 'Rumah Sakit\nPraktek Dokter\nFarmasi'
            ],
            [
                'name' => 'Keuangan dan Investasi',
                'description' => 'Perusahaan Investasi\nManajemen Aset'
            ],
            [
                'name' => 'Teknologi Lingkungan dan Energi Terbarukan',
                'description' => 'Perusahaan yang berfokus pada solusi lingkungan dan energi terbarukan.'
            ],
            [
                'name' => 'Industri Pangan dan Minuman',
                'description' => 'Produksi makanan dan minuman.'
            ],
            [
                'name' => 'Perdagangan Elektronik',
                'description' => 'Perusahaan yang berfokus pada e-commerce dan perdagangan online.'
            ],
            [
                'name' => 'Konsultasi dan Jasa Bisnis',
                'description' => 'Jasa konsultan bisnis, hukum, dan manajemen.'
            ],
            [
                'name' => 'Pengelolaan Limbah',
                'description' => 'Perusahaan yang bergerak dalam pengelolaan limbah dan daur ulang.'
            ],
            [
                'name' => 'Teknologi Keamanan',
                'description' => 'Perusahaan yang berfokus pada teknologi keamanan, seperti keamanan siber dan keamanan fisik.'
            ]
        ]);

        DB::table('number_of_employees')->insert([
            [
                'label' => '1 hingga 9 karyawan.',
                'min' => '1',
                'max' => '9'
            ],
            [
                'label' => '10 hingga 49 karyawan.',
                'min' => '10',
                'max' => '49'
            ],
            [
                'label' => '50 hingga 249 karyawan.',
                'min' => '50',
                'max' => '249'
            ],
            [
                'label' => '250 hingga 999 karyawan.',
                'min' => '250',
                'max' => '999'
            ],
            [
                'label' => '1.000 hingga 9.999 karyawan.',
                'min' => '1000',
                'max' => '9999'
            ],
            [
                'label' => '10.000 karyawan atau lebih.',
                'min' => '10000',
                'max' => '1000000'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

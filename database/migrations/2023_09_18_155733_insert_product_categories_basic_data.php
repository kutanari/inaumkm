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
        DB::table('product_categories')->insert([
            [
                'name' => 'Elektronik Konsumen',
                'description' => 'Elektronik Konsumen',
                'parent' => 0
            ],
            [
                'name' => 'Pakaian dan Mode',
                'description' => 'Pakaian dan Mode',
                'parent' => 0
            ],
            [
                'name' => 'Kesehatan dan Kecantikan',
                'description' => 'Kesehatan dan Kecantikan',
                'parent' => 0
            ],
            [
                'name' => 'Makanan dan Minuman',
                'description' => 'Makanan dan Minuman',
                'parent' => 0
            ],
            [
                'name' => 'Otomotif',
                'description' => 'Otomotif',
                'parent' => 0
            ],
            [
                'name' => 'Perabotan Rumah Tangga',
                'description' => 'Perabotan Rumah Tangga',
                'parent' => 0
            ],
            [
                'name' => 'Olahraga dan Rekreasi',
                'description' => 'Olahraga dan Rekreasi',
                'parent' => 0
            ],
            [
                'name' => 'Perlengkapan Rumah dan Dekorasi',
                'description' => 'Perlengkapan Rumah dan Dekorasi',
                'parent' => 0
            ],
            [
                'name' => 'Perangkat Lunak dan Teknologi',
                'description' => 'Perangkat Lunak dan Teknologi',
                'parent' => 0
            ],
            [
                'name' => 'Buku dan Media Hiburan',
                'description' => 'Buku dan Media Hiburan',
                'parent' => 0
            ],
            [
                'name' => 'Produk Kesejahteraan Hewan Peliharaan',
                'description' => 'Produk Kesejahteraan Hewan Peliharaan',
                'parent' => 0
            ],
            [
                'name' => 'Perangkat Elektronik dan Komponen',
                'description' => 'Perangkat Elektronik dan Komponen',
                'parent' => 0
            ],
            [
                'name' => 'Perlengkapan Keamanan dan Perlindungan',
                'description' => 'Perlengkapan Keamanan dan Perlindungan',
                'parent' => 0
            ],
            [
                'name' => 'Produk Lingkungan dan Ramah Lingkungan',
                'description' => 'Produk Lingkungan dan Ramah Lingkungan',
                'parent' => 0
            ],
            [
                'name' => 'Perangkat Medis dan Kesehatan',
                'description' => 'Perangkat Medis dan Kesehatan',
                'parent' => 0
            ],
            [
                'name' => 'Smartphone',
                'description' => 'Smartphone',
                'parent' => 1
            ],
            [
                'name' => 'Laptop',
                'description' => 'Laptop',
                'parent' => 1
            ],
            [
                'name' => 'Televisi',
                'description' => 'Televisi',
                'parent' => 1
            ],
            [
                'name' => 'Kamera',
                'description' => 'Kamera',
                'parent' => 1
            ],
            [
                'name' => 'Earphone dan headphone',
                'description' => 'Earphone dan headphone',
                'parent' => 1
            ],
            [
                'name' => 'Pakaian pria, wanita, dan anak-anak',
                'description' => 'Pakaian pria, wanita, dan anak-anak',
                'parent' => 2
            ],
            [
                'name' => 'Sepatu',
                'description' => 'Sepatu',
                'parent' => 2
            ],
            [
                'name' => 'Aksesoris (misalnya, tas, topi, kacamata)',
                'description' => 'Aksesoris (misalnya, tas, topi, kacamata)',
                'parent' => 2
            ],
            [
                'name' => 'Produk perawatan kulit',
                'description' => 'Produk perawatan kulit',
                'parent' => 3
            ],
            [
                'name' => 'Produk perawatan rambut',
                'description' => 'Produk perawatan rambut',
                'parent' => 3
            ],
            [
                'name' => 'Suplemen makanan',
                'description' => 'Suplemen makanan',
                'parent' => 3
            ],
            [
                'name' => 'Kosmetik',
                'description' => 'Kosmetik',
                'parent' => 3
            ],
            [
                'name' => 'Peralatan kecantikan (misalnya, sikat makeup)',
                'description' => 'Peralatan kecantikan (misalnya, sikat makeup)',
                'parent' => 3
            ],
            [
                'name' => 'Produk makanan olahan',
                'description' => 'Produk makanan olahan',
                'parent' => 4
            ],
            [
                'name' => 'Minuman ringan',
                'description' => 'Minuman ringan',
                'parent' => 4
            ],
            [
                'name' => 'Makanan organik',
                'description' => 'Makanan organik',
                'parent' => 4
            ],
            [
                'name' => 'Produk kopi dan teh',
                'description' => 'Produk kopi dan teh',
                'parent' => 4
            ],
            [
                'name' => 'Mobil',
                'description' => 'Mobil',
                'parent' => 5
            ],
            [
                'name' => 'Sepeda motor',
                'description' => 'Sepeda motor',
                'parent' => 5
            ],
            [
                'name' => 'Suku cadang mobil',
                'description' => 'Suku cadang mobil',
                'parent' => 5
            ],
            [
                'name' => 'Aksesoris otomotif',
                'description' => 'Aksesoris otomotif',
                'parent' => 5
            ],
            [
                'name' => 'Sofa',
                'description' => 'Sofa',
                'parent' => 6
            ],
            [
                'name' => 'Meja dan kursi',
                'description' => 'Meja dan kursi',
                'parent' => 6
            ],
            [
                'name' => 'Lemari',
                'description' => 'Lemari',
                'parent' => 6
            ],
            [
                'name' => 'Kasur dan perlengkapan tidur',
                'description' => 'Kasur dan perlengkapan tidur',
                'parent' => 6
            ],
            [
                'name' => 'Alat kebugaran',
                'description' => 'Alat kebugaran',
                'parent' => 7
            ],
            [
                'name' => 'Sepatu olahraga',
                'description' => 'Sepatu olahraga',
                'parent' => 7
            ],
            [
                'name' => 'Peralatan camping',
                'description' => 'Peralatan camping',
                'parent' => 7
            ],
            [
                'name' => 'Bola dan alat olahraga lainnya',
                'description' => 'Bola dan alat olahraga lainnya',
                'parent' => 7
            ],
            [
                'name' => 'Peralatan dapur',
                'description' => 'Peralatan dapur',
                'parent' => 8
            ],
            [
                'name' => 'Lampu dan pencahayaan',
                'description' => 'Lampu dan pencahayaan',
                'parent' => 8
            ],
            [
                'name' => 'Barang dekorasi rumah',
                'description' => 'Barang dekorasi rumah',
                'parent' => 8
            ],
            [
                'name' => 'Alat-alat kebersihan',
                'description' => 'Alat-alat kebersihan',
                'parent' => 8
            ],
            [
                'name' => 'Perangkat lunak bisnis',
                'description' => 'Perangkat lunak bisnis',
                'parent' => 9
            ],
            [
                'name' => 'Aplikasi seluler',
                'description' => 'Aplikasi seluler',
                'parent' => 9
            ],
            [
                'name' => 'Perangkat keras komputer',
                'description' => 'Perangkat keras komputer',
                'parent' => 9
            ],
            [
                'name' => 'Layanan cloud',
                'description' => 'Layanan cloud',
                'parent' => 9
            ],
            [
                'name' => 'Buku cetak dan digital',
                'description' => 'Buku cetak dan digital',
                'parent' => 10
            ],
            [
                'name' => 'DVD dan Blu-ray',
                'description' => 'DVD dan Blu-ray',
                'parent' => 10
            ],
            [
                'name' => 'Musik CD dan digital',
                'description' => 'Musik CD dan digital',
                'parent' => 10
            ],
            [
                'name' => 'Perangkat pembaca e-book',
                'description' => 'Perangkat pembaca e-book',
                'parent' => 10
            ],
            [
                'name' => 'Makanan hewan peliharaan',
                'description' => 'Makanan hewan peliharaan',
                'parent' => 11
            ],
            [
                'name' => 'Mainan dan aksesoris hewan peliharaan',
                'description' => 'Mainan dan aksesoris hewan peliharaan',
                'parent' => 11
            ],
            [
                'name' => 'Perawatan kesehatan hewan peliharaan',
                'description' => 'Perawatan kesehatan hewan peliharaan',
                'parent' => 11
            ],
            [
                'name' => 'Mikrokontroler',
                'description' => 'Mikrokontroler',
                'parent' => 12
            ],
            [
                'name' => 'Sensor',
                'description' => 'Sensor',
                'parent' => 12
            ],
            [
                'name' => 'Komponen elektronik pasif (misalnya, resistor, kapasitor)',
                'description' => 'Komponen elektronik pasif (misalnya, resistor, kapasitor)',
                'parent' => 12
            ],
            [
                'name' => 'Kamera pengawas',
                'description' => 'Kamera pengawas',
                'parent' => 13
            ],
            [
                'name' => 'Alarm keamanan',
                'description' => 'Alarm keamanan',
                'parent' => 13
            ],
            [
                'name' => 'Gembok dan perlengkapan pengamanan',
                'description' => 'Gembok dan perlengkapan pengamanan',
                'parent' => 13
            ],
            [
                'name' => 'Lampu hemat energi',
                'description' => 'Lampu hemat energi',
                'parent' => 14
            ],
            [
                'name' => 'Kendaraan listrik',
                'description' => 'Kendaraan listrik',
                'parent' => 14
            ],
            [
                'name' => 'Produk daur ulang',
                'description' => 'Produk daur ulang',
                'parent' => 14
            ],
            [
                'name' => 'Peralatan medis',
                'description' => 'Peralatan medis',
                'parent' => 15
            ],
            [
                'name' => 'Alat pengukur kesehatan (misalnya, tensimeter)',
                'description' => 'Alat pengukur kesehatan (misalnya, tensimeter)',
                'parent' => 15
            ],
            [
                'name' => 'Obat-obatan',
                'description' => 'Obat-obatan',
                'parent' => 15
            ]
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

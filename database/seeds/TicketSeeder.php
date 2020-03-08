<?php

use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->insert([
            'jenis' => 'Early Bird',
            'kategori' => '5K',
            'harga' => 250000,
            'deskripsi' => 'ini deskripsi 5K',
            'kuota' => 200,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tickets')->insert([
            'jenis' => 'Reguler',
            'kategori' => '10K',
            'harga' => 300000,
            'deskripsi' => 'ini deskripsi 10K',
            'kuota' => 250,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tickets')->insert([
            'jenis' => 'Reguler',
            'kategori' => '21K',
            'harga' => 350000,
            'deskripsi' => 'ini deskripsi 21K',
            'kuota' => 300,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

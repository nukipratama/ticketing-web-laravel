<?php

use Illuminate\Database\Seeder;

class BookParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Book::class, 100)->create([
            'jumlah' => 10,
            'jenis' => 'Reguler',
            'kategori' => '21K',
            'harga' => 200000,
            'status' => 2
        ])->each(function ($book) {
            factory(App\Participant::class, $book->jumlah)->create([
                'bid' => $book->bid,
            ]);
        });
    }
}

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
        factory(App\Book::class, 1000)->create()->each(function ($book) {
            factory(App\Participant::class, $book->jumlah)->create([
                'bid' => $book->bid,
            ]);
        });
    }
}

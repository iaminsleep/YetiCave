<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class BetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bets = [
            //1st lot
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 13600,
                'author_id' => 2,
                'lot_id' => 1,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 13000,
                'author_id' => 3,
                'lot_id' => 1,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 12000,
                'author_id' => 2,
                'lot_id' => 1,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 11300,
                'author_id' => 4,
                'lot_id' => 1,
            ],
            //2nd lot
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 190000,
                'author_id' => 4,
                'lot_id' => 2,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 181200,
                'author_id' => 3,
                'lot_id' => 2,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 173300,
                'author_id' => 4,
                'lot_id' => 2,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 170300,
                'author_id' => 1,
                'lot_id' => 2,
            ],
            //3rd lot
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 9700,
                'author_id' => 1,
                'lot_id' => 3,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 9420,
                'author_id' => 2,
                'lot_id' => 3,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 9300,
                'author_id' => 4,
                'lot_id' => 3,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 8200,
                'author_id' => 2,
                'lot_id' => 3,
            ],
            //4th lot
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 13590,
                'author_id' => 3,
                'lot_id' => 4,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 12520,
                'author_id' => 1,
                'lot_id' => 4,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 12400,
                'author_id' => 3,
                'lot_id' => 4,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 11000,
                'author_id' => 2,
                'lot_id' => 4,
            ],
            //5th lot
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 8400,
                'author_id' => 3,
                'lot_id' => 5,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 8300,
                'author_id' => 2,
                'lot_id' => 5,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 8100,
                'author_id' => 3,
                'lot_id' => 5,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 8000,
                'author_id' => 4,
                'lot_id' => 5,
            ],
            //6th lot
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 6600,
                'author_id' => 1,
                'lot_id' => 6,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 6000,
                'author_id' => 4,
                'lot_id' => 6,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 5800,
                'author_id' => 1,
                'lot_id' => 6,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 5600,
                'author_id' => 4,
                'lot_id' => 6,
            ],
            //7th lot
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 82500,
                'author_id' => 1,
                'lot_id' => 7,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 83500,
                'author_id' => 2,
                'lot_id' => 7,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 87000,
                'author_id' => 4,
                'lot_id' => 7,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 89000,
                'author_id' => 2,
                'lot_id' => 7,
            ],
            //8th lot
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 68600,
                'author_id' => 1,
                'lot_id' => 8,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 67800,
                'author_id' => 3,
                'lot_id' => 8,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 68400,
                'author_id' => 2,
                'lot_id' => 8,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 68800,
                'author_id' => 1,
                'lot_id' => 8,
            ],
            //9th lot
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 15200,
                'author_id' => 2,
                'lot_id' => 9,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 15399,
                'author_id' => 3,
                'lot_id' => 9,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 15900,
                'author_id' => 2,
                'lot_id' => 9,
            ],
            [
                'bet_date' => Carbon::now()->timezone('Europe/Moscow'),
                'bet_price' => 16500,
                'author_id' => 4,
                'lot_id' => 9,
            ],
        ];

        DB::table('bets')->insert($bets);
    }
}

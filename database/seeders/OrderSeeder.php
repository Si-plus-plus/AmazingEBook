<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fillCart();
        $this->fillOrderHistory();
    }

    private function fillOrderHistory(){
        $accounts_count = DB::table('accounts')->count();
        for ($account_id = 1; $account_id <= $accounts_count; $account_id+=1){
            $order_num = rand(1,5);
            for ($orders = 0; $orders < $order_num; $orders += 1){
                $this->createOrder($account_id, now());
            }
        }
    }

    private function fillCart(){
        $accounts_count = DB::table('accounts')->count();
        for ($account_id = 1; $account_id <= $accounts_count; $account_id+=1){
            $this->createOrder($account_id, null);
        }
    }

    private function createOrder($account_id, $order_date) {
        $order_id = DB::table('header_orders')->insertGetId([
            'order_date' => $order_date,
            'account_id' => $account_id,
        ]);

        $e_books_count = DB::table('e_books')->count();

        for ($e_book_id = 1; $e_book_id <= $e_books_count; $e_book_id++) {
            if (rand(0,1) > 0) {
                $this->fillOrder($order_id, $e_book_id);
            }
        }
    }

    private function fillOrder($order_id, $e_book_id) {
        $e_book = DB::table('e_books')
            ->where('id', $e_book_id)
            ->get()[0];

        DB::table('detail_orders')->insert([
            'order_id' => $order_id,
            'e_book_id' => $e_book_id,
        ]);
    }
}

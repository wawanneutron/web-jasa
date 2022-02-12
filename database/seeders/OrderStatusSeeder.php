<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_status = [
            [
                'name'          =>  'Approved',
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'name'          =>  'Progress',
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'name'          =>  'Rejected',
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'name'          =>  'Waiting',
                'created_at'    => date('Y-m-d H:i:s')
            ],
        ];
        OrderStatus::insert($order_status);
    }
}

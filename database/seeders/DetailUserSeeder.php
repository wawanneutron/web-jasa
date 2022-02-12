<?php

namespace Database\Seeders;

use App\Models\DetailUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detail_user = [
            [
                'users_id'          => 1,
                'photo'             => '',
                'role'              => 'Backend Developer',
                'contact_number'    => '',
                'biography'         => '',
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'users_id'          => 2,
                'photo'             => '',
                'role'              => 'Frontend Developer',
                'contact_number'    => '',
                'biography'         => '',
                'created_at'        => date('Y-m-d H:i:s')
            ]
        ];
        DetailUser::insert($detail_user);
    }
}

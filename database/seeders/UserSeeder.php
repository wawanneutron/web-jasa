<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'      => 'Jhon Doe',
                'email'     =>  'jhon@email.com',
                'password'  =>  Hash::make('password'),
                'created_at'    =>  date('Y-m-d H:i:s')
            ],
            [
                'name'      => 'Jen Doe',
                'email'     =>  'Jen@email.com',
                'password'  =>  Hash::make('password'),
                'created_at'    =>  date('Y-m-d H:i:s')
            ]
        ];
        User::insert($users);
    }
}

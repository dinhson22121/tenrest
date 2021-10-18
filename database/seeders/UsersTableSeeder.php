<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'email'=>'admin@admin.com',
            'password' =>bcrypt('admin'),
            'name' => 'Admin',
            'Address' =>'',
            'Phone' =>0,
            'Is_admin' =>1,
            'Active' =>1,
            'Avatar' =>'',
            'Is_Delete' =>0,
            'Token' =>'',
            'dateJoin'=> '2021/08/09',
        ];
        DB::table('user')->insert($data);
    }
}

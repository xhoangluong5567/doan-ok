<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = 
            [
                'email'=>'xhoangluong@gmail.com',
                'name' => 'Hoang Luong',
                'password'=>bcrypt('xhoangluong'),
                'phone'=>'0963600036',
                'level'=>1
            ];

            [
                'email'=>'xhoangluong1@gmail.com',
                'name' => 'Hoàng Lương',
                'password'=>bcrypt('xhoangluong'),
                'phone'=>'0963600034',
                'level'=>1
            ];
            [
                'email'=>'xhoangluong2@gmail.com',
                'name' => 'Hoang Luong',
                'password'=>bcrypt('xhoangluong'),
                'phone'=>'0963600033',
                'level'=>1
            ];
            DB::table('users')->insert($data);
        
    }
}

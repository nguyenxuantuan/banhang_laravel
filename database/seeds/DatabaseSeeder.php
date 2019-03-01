<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'XuanTuan',
            'email' => 'nxtuan1234@gmail.com',
            'password' => bcrypt('tuan1996'),
        ]);
    }
}

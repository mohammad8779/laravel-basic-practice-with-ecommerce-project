<?php

use Illuminate\Database\Seeder;

class UsersAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('tbl_admin')->insert([
            'admin_name' => 'locus',
            'admin_email' => 'locus@gmail.com',
            'admin_password' => md5('12345'),
            'access_lebel' => '1',
        ]);
    }
}

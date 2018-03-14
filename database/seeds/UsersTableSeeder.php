<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Masukkan rekod demo ke table users
        // Rekod user 1
        DB::table('users')->insert([
          'username' => 'admin',
          'email' => 'admin@gmail.com',
          'nama' => 'System Admin',
          'no_kp' => '808080808888',
          'telefon' => '017-8888888',
          'status' => 'active',
          'role' => 'admin',
          'password' => bcrypt('admin')
        ]);

        // Rekod user 2
        DB::table('users')->insert([
          'username' => 'demo',
          'email' => 'demo@gmail.com',
          'nama' => 'Demo User',
          'no_kp' => '808080809999',
          'telefon' => '017-9999999',
          'status' => 'active',
          'role' => 'user',
          'password' => bcrypt('demo')
        ]);

        // Rekod user 3
        DB::table('users')->insert([
          'username' => 'test',
          'email' => 'test@gmail.com',
          'nama' => 'System Test',
          'no_kp' => '808080807777',
          'telefon' => '017-7777777',
          'status' => 'active',
          'role' => 'user',
          'password' => bcrypt('test')
        ]);
    }
}

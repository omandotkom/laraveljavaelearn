<?php

use Illuminate\Database\Seeder;

class UsersTrableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Oman',
            'email' => 'omandotkom@gmail.com',
            'password' => Hash::make('system3298'),
        ]);
        DB::table('users')->insert([
            'name' => 'Dilla',
            'email' => 'dilla@gmail.com',
            'password' => Hash::make('system3298'),
            'role' => 'admin'
        ]);
    }
}

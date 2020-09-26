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
        /*DB::table('users')->insert([
            'name' => 'Oman',
            'email' => 'omandotkom@gmail.com',
            'password' => Hash::make('system3298'),
        ]);
        DB::table('users')->insert([
            'name' => 'Dilla',
            'email' => 'dilla@gmail.com',
            'password' => Hash::make('system3298'),
            'role' => 'admin'
        ]);*/
        DB::table('users')->insert([
            'name' => 'Oman 2',
            'email' => 'a@gmail.com',
            'password' => Hash::make('system3298'),
        ]);
        DB::table('users')->insert([
            'name' => 'Oman 3',
            'email' => 'b@gmail.com',
            'password' => Hash::make('system3298'),
        ]);
        DB::table('users')->insert([
            'name' => 'Oman 4',
            'email' => 'c@gmail.com',
        'role' =>'superadmin',
            'password' => Hash::make('system3298'),
        ]);
        DB::table('users')->insert([
            'name' => 'Oman 5',
            'email' => 'd@gmail.com',
            'password' => Hash::make('system3298'),
        ]);
        DB::table('users')->insert([
            'name' => 'Oman 6',
            'email' => 'e@gmail.com',
            'password' => Hash::make('system3298'),
        ]);
    }
}

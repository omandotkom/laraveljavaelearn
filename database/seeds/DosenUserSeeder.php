<?php

use Illuminate\Database\Seeder;

class DosenUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Dilla',
            'email' => 'dilla@gmail.com',
            'password' => Hash::make('system3298'),
            'role' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'Burhan',
            'email' => 'burhan@gmail.com',
            'password' => Hash::make('system3298'),
            'role' => 'admin'
        ]);
    }
}

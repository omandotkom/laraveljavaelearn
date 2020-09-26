<?php

use Illuminate\Database\Seeder;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Superadmin',
            'role' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('system3298'),
        ]);
    }
}

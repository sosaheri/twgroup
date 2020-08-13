<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'demo',
            'email' => 'demo@twgroup.com',
            'email_verified_at' => now(),
            'password' => Hash::make('demo'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InsertSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'Niculai Ilie-Traian',
            'email'     => 'niculaii58@gmail.com',
            'password'  => Hash::make('Test'),
            'role_id'   => 3,
        ]);
        DB::table('users')->insert([
            'name'      => 'Niculai Ilie-Traian',
            'email'     => 'client@gmail.com',
            'password'  => Hash::make('Test'),
            'role_id'   => 1,
        ]);
    }
}

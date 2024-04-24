<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertDefaultRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'role_name' => 'Client',
        ]);
        DB::table('user_roles')->insert([
            'role_name' => 'Admin',
        ]);
        DB::table('user_roles')->insert([
            'role_name' => 'Manager',
        ]);
    }
}

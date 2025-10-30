<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'email' => 'superadmin@gmail.com'
        ], [
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email'=>'superadmin@gmail.com',
            'password' => bcrypt('superadmin123')
        ]);
    }
}

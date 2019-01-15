<?php

use App\Enumeration\Role;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = 'admin@gmail.com';
        $adminMailCheck = DB::table('users')->where('email', $email)->first();

        if ($adminMailCheck == false) {
            DB::table('users')->insert([
                'name' => 'admin',
                'email' => $email,
                'password' => bcrypt('123456'),
                'role' => Role::ADMIN,
            ]);
        }
    }
}

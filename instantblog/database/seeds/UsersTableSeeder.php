<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'id' => '1',
            'username' => 'admin',
            'is_admin' => '1',
            'name' => 'Admin Name',
            'email' => 'your@email.com',
            'password' => bcrypt('password'),
        ]);
    }
}

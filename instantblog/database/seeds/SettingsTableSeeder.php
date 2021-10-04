<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        Setting::create([
            'id' => '1',
            'site_name' => 'Your Site Name',
            'site_desc' => 'Your Description',
            'site_title' => 'Site Title',
            'home_link' => 'Home',
            'pop_link' => 'Popular',
            'cat_link' => 'Categories',
            'arch_link' => 'Archives',
            'search_link' => 'Search',
            'login_link' => 'Login'
        ]);
    }
}

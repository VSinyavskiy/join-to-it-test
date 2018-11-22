<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Admin::where('email', env('ADMIN_DEFAULT_EMAIL', 'admin@admin.com'))->count() == 0) {
            $admin = Admin::create([
                'name' => 'Admin',
                'email' => env('ADMIN_DEFAULT_EMAIL', 'admin@admin.com'),
                'password' => env('ADMIN_DEFAULT_PASSWORD', 'password'),
            ])->save();
        }
    }
}

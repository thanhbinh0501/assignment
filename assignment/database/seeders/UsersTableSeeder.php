<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Thêm admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'), // Thay đổi mật khẩu nếu cần
            'is_admin' => '1',
        ]);

        // Thêm user khác nếu cần
        User::create([
            'name' => 'thanhbinhqns',
            'email' => 'thanhbinhqns04@gmail.com',
            'password' => Hash::make('password'), // Thay đổi mật khẩu nếu cần
            'is_admin' => '0',
        ]);
    }
}

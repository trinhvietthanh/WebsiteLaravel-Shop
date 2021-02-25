<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
    [
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number'=> '09123293240',
        'sex'=> 0,
        'role_id'=> 1,
        'created_at' => now(),
        'updated_at' => now(),
        'email_verified_at' => now(),
    ],
    [
        'name' => 'user',
        'email' => 'user@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number'=> '09123292132',
        'sex'=> 1,
        'role_id'=> 7,
        'created_at' => now(),
        'updated_at' => now(),
        'email_verified_at' => now(),
    ],
    [
        'name' => 'thanh',
        'email' => 'thanh@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number'=> '0923293240',
        'sex'=> 0,
        'role_id'=> 4,
        'created_at' => now(),
        'updated_at' => now(),
        'email_verified_at' => now(),
    ],
]);

DB::table('permissions')->insert([
    ['name' => 'review_category', 'display_name' => 'Quản lý danh mục'],
    ['name' => 'view_author', 'display_name' => 'Quản lý tác giả'],
    ['name' => 'view_publisher', 'display_name' => 'Quản lý NBX'],
    ['name' => 'view_stock', 'display_name' => 'Quản lý Kho'],
    ['name' => 'view_bill', 'display_name' => 'Quản lý Đơn hàng'],
    ['name' => 'view_user', 'display_name' => 'Quản lý người dùng'],
]);

DB::table('roles')->insert([
    ['name' => 'admin'],
    ['name' => 'Kiểm hàng'],
    ['name' => 'Quản lý khách hàng'],
    ['name' => 'Nhân viên quản lý web'],
    ['name' => 'Nhân viên chốt đơn'],
    ['name' => 'Nhân viên kho'],
    ['name' => 'Người dùng']
]);
DB::table('permission_role')->insert([
    ['permission_id' => 1, 'role_id' => 1],
    ['permission_id' => 2, 'role_id' => 1],
    ['permission_id' => 3, 'role_id' => 1],
    ['permission_id' => 4, 'role_id' => 1],
    ['permission_id' => 5, 'role_id' => 1],
    ['permission_id' => 6, 'role_id' => 1],
    ['permission_id' => 4, 'role_id' => 2],
    ['permission_id' => 5, 'role_id' => 2],
    ['permission_id' => 6, 'role_id' => 3],
    ['permission_id' => 1, 'role_id' => 4],
    ['permission_id' => 2, 'role_id' => 4],
    ['permission_id' => 3, 'role_id' => 4],
    ['permission_id' => 4, 'role_id' => 4],
    ['permission_id' => 5, 'role_id' => 5],
    ['permission_id' => 6, 'role_id' => 6],
]);
    }
}

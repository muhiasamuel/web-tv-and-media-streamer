<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $genericUser = Role::where('name', 'normal_user')->first();

$admin = User::create([
    'name'=>'Admin User',
    'email'=>'admin@admin.com',
    'password'=>Hash::make('password')

]);
$genericUser = User::create([
    'name'=>'User',
    'email'=>'user@user.com',
    'password'=>Hash::make('12345678')
]);
$admin->roles()->attach($adminRole);
$genericUser->roles()->attach($genericUser);
    }
}

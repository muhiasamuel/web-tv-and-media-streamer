<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   //create roles
   Role::truncate();

   Role::create(['name' =>'admin']);
   Role::create(['name' =>'normal_user']);

    }
}

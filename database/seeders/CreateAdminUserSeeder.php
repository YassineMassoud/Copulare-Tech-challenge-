<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'admin',
        	'email' => 'admin@example.com',
        	'password' => bcrypt('12345678')
        ]);


        $role = Role::create(['name' => 'super_admin']);

        $role->givePermissionTo('super_admin_permission');

        $user->assignRole([$role->id]);
    }
}

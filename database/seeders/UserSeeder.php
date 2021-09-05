<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin account seeder
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678')
        ]);
        
        $role = Role::create(['name' => 'Administrator']);
        $permissions = Permission::pluck('id')->all();
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);


        // Staff account seeder
        $staff = User::create([
            'name' => 'Staff',
            'email' => 'staff@mail.com',
            'password' => bcrypt('12345678')
        ]);

        // Exception permissions
        $exception = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete'
        ];

        // Staff can't have permission to edit roles
        $role = Role::create(['name' => 'Staff']);
        $permissions = Permission::whereNotIn('name', $exception)->get();
        $role->syncPermissions($permissions);
        $staff->assignRole([$role->id]);
    }
}

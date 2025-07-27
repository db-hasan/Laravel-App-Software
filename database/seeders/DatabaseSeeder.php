<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\RoleModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
         private $permissions = [
        'admin-dashboard',
        'user-permission','user-manage',
        'role-permission', 'role-manage',
        'order-view', 'order-delete',
        'admin-report',
        'finance-view', 'finance-manage',
        'password-update',
    ];

    private $roleModeles = [
        'superadmin',
        'admin',
        'authority',
        'manager',
        'finance',
    ];

    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        };
        
        foreach ($this->roleModeles as $roleModel) {
            RoleModel::create(['name' => $roleModel]);
        };


        // User Create
         $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'number' => '8801723629080',
            'password' => Hash::make('12345678'),
            'rolename' => 'superadmin',
            'status' => '1',
        ]);

        $role = Role::create(['name' => 'superadmin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->syncRoles([$role->id]);
    }
}

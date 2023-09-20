<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //list permissions
    private $permissions = [
        'view_users',
        'add_users',
        'edit_users',
        'delete_users',
        'view_roles',
        'add_roles',
        'edit_roles',
        'delete_roles',
        'view_permissions',
        'add_permissions',
        'edit_permissions',
        'delete_permissions',
        'view_icas',
        'add_icas',
        'edit_icas',
        'delete_icas',
        'view_incident',
        'add_incident',
        'edit_incident',
        'delete_incident',
        'view_incident_types',
        'add_incident_types',
        'edit_incident_types',
        'delete_incident_types',
        'view_sor',
        'add_sor',
        'edit_sor',
        'delete_sor',
        'view_sor_types',
        'add_sor_types',
        'edit_sor_types',
        'delete_sor_types',
    ];



    public function run()
    {
        //create permissions
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $user = new User();

        $user->name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = Hash::make('12345678');

        $user->save();

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);


    }
}

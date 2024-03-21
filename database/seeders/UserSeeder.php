<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        'view_sor',
        'add_sor',
        'edit_sor',
        'delete_sor',
        'view_sor_types',
        'edit_sor_types',
        'delete_sor_types',
        'add_tasks',
        'edit_tasks',
        'delete_tasks',
        'view_tasks',
        'view_reported_hazard',
        'edit_reported_hazard',
        'delete_reported_hazard',
        'view_medical_treated_case',
        'edit_medical_treated_case',
        'delete_medical_treated_case',
        'view_lost_time_accident',
        'edit_lost_time_accident',
        'delete_lost_time_accident',
        'view_improvement',
        'add_improvement',
        'edit_improvement',
        'delete_improvement',
        'view_first_aid_case',
        'edit_first_aid_case',
        'delete_first_aid_case',
        'view_bad_practise',
        'edit_bad_practise',
        'delete_bad_practise',
        'view_good_practise',
        'edit_good_practise',
        'delete_good_practise',
        'edit_near_miss',
        'delete_near_miss',
        'view_near_miss',
        'view_supervisor',
        'add_supervisor',
        'edit_supervisor',
        'delete_supervisor',
        'view_personnel_present',
        'add_personnel_present',
        'edit_personnel_present',
        'delete_personnel_present',
        'view_first_responder',
        'add_first_responder',
        'edit_first_responder',
        'delete_first_responder',
        'view_environment',
        'add_environment',
        'edit_environment',
        'delete_environment',
        'view_environmental_policies',
        'add_environmental_policies',
        'edit_environmental_policies',
        'delete_environmental_policies',
        'add_permit',
        'edit_permit',
        'delete_permit',
        'view_permit',
        
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

        $user1 = new User();

        $user1->name = 'User';
        $user1->email = 'user@domain.com';
        $user1->password = Hash::make('12345678');

        $user1->save();

        $role1 = Role::create(['name' => 'User']);

        //pick half of the permissions randomly
        $permissions1 = Permission::pluck('id', 'id')->random(count($permissions) / 2)->all();

        $role1->syncPermissions($permissions1);

        $user1->assignRole([$role1->id]);

    }
}

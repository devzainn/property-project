<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        
        $permission= Permission::updateOrCreate(['name' => 'contact_buyer'], 
            ['name' => 'contact_buyer']
        );
        $permission1= Permission::updateOrCreate(['name' => 'manage_site_plans'], 
            ['name' => 'manage_site_plans']
        );
        $permission2 = Permission::updateOrCreate(['name' => 'manage_bookings'], 
            ['name' => 'manage_bookings']
        );
        $permission3 = Permission::updateOrCreate(['name' => 'sales_list'], 
            ['name' => 'sales_list']
        );
        $permission4 = Permission::updateOrCreate(['name' => 'sales_reports'], 
            ['name' => 'sales_reports']
        );
        $permission5 = Permission::updateOrCreate(['name' => 'manage_properties'], 
            ['name' => 'manage_properties']
        );
        $permission6 = Permission::updateOrCreate(['name' => 'manage_archives'], 
            ['name' => 'manage_archives']
        );
        $permission7 = Permission::updateOrCreate(['name' => 'manage_keys'], 
            ['name' => 'manage_keys']
        );
        $permission8 = Permission::updateOrCreate(['name' => 'manage_notaries'], 
            ['name' => 'manage_notaries']
        );
        $permission9 = Permission::updateOrCreate(['name' => 'manage_banks'], 
            ['name' => 'manage_banks']
        );
        $permission10 = Permission::updateOrCreate(['name' => 'manage_users'], 
            ['name' => 'manage_users']
        );


        $role_admin = Role::updateOrCreate(['name' => 'admin'], 
            ['name' => 'admin']
        );
        $role_marketing = Role::updateOrCreate(['name' => 'marketing'], 
            ['name' => 'marketing']
        ) ;
        $role_manajer = Role::updateOrCreate(['name' => 'manajer'], 
            ['name' => 'manajer']
        );

        
        $role_admin->givePermissionTo($permission);
        $role_admin->givePermissionTo($permission2);
        $role_admin->givePermissionTo($permission3);
        $role_admin->givePermissionTo($permission4);
        $role_admin->givePermissionTo($permission5);
        $role_admin->givePermissionTo($permission6);
        $role_admin->givePermissionTo($permission7);
        $role_admin->givePermissionTo($permission8);
        $role_admin->givePermissionTo($permission9);
        $role_admin->givePermissionTo($permission10);

        $role_marketing->givePermissionTo($permission);
        $role_marketing->givePermissionTo($permission1);
        $role_marketing->givePermissionTo($permission2);
        $role_marketing->givePermissionTo($permission3);
        
        $role_manajer->givePermissionTo($permission4);
        $role_manajer->givePermissionTo($permission10);

        $user = User::find(1);
        $user->assignRole('admin');
        $user = User::find(2);
        $user->assignRole('marketing');
        $user = User::find(6); 
        $user->assignRole('manajer');
    }
}

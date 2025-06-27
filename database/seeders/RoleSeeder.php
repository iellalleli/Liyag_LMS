<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $client = Role::firstOrCreate(['name' => 'client']);
        $salesRep = Role::firstOrCreate(['name' => 'sales_rep']);

        // Assign permissions to roles
        $admin->givePermissionTo(Permission::all());
        $salesRep->givePermissionTo(['manage-checklists', 'manage-leads']);
        $client->givePermissionTo(['manage-inquiries', 'manage-quotations']);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'products.view',
            'products.create',
            'products.update',
            'products.delete',
            'categories.manage',
            'tags.manage',
            'certifications.manage',
            'orders.manage',
            'customers.manage',
            'consultations.manage',
            'pages.manage',
            'media.manage',
            'users.manage',
            'audits.view',
            'seo.manage',
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }

        $superAdmin = Role::findOrCreate('Super Admin');
        $manager = Role::findOrCreate('Manager');

        $superAdmin->syncPermissions($permissions);

        $manager->syncPermissions([
            'products.view',
            'products.create',
            'products.update',
            'categories.manage',
            'tags.manage',
            'certifications.manage',
            'orders.manage',
            'customers.manage',
            'consultations.manage',
            'pages.manage',
            'media.manage',
            'audits.view',
            'seo.manage',
        ]);
    }
}

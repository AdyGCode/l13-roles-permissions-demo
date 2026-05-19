<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
    {

        $seedRoles = [
            // Roles depend on the application's requirements
            ['name' => 'super-admin'],
            ['name' => 'admin'],
            ['name' => 'staff'],
            ['name' => 'client'],

            ['name' => 'editor'],
            ['name' => 'writer'],
            ['name' => 'viewer'],
        ];


        $seedPermissions = [
            // Structure of Seeder Lines:
            //    [ 'permission'=>'', 'roles'=> ['',]],
            ['permission' => 'user-add', 'roles' => ['admin', 'staff']],
            ['permission' => 'user-edit', 'roles' => ['admin', 'staff']],
            ['permission' => 'user-browse', 'roles' => ['admin', 'staff']],
            ['permission' => 'user-read', 'roles' => ['admin']],
            ['permission' => 'user-delete', 'roles' => ['admin']],

            ['permission' => 'client-only', 'roles' => ['client']],
            ['permission' => 'staff-only', 'roles' => ['staff']],
            ['permission' => 'admin-only', 'roles' => ['admin']],

            [ 'permission' => 'article-view', 'roles' => ['admin', 'staff', 'editor', 'writer', 'client', 'viewer'], ],
            [ 'permission' => 'article-add', 'roles' => ['admin', 'staff', 'writer'], ],
            [ 'permission' => 'article-edit', 'roles' => ['admin', 'writer', 'editor'], ],
            [ 'permission' => 'article-publish', 'roles' => ['admin', 'staff', 'editor'], ],
            [ 'permission' => 'article-delete', 'roles' => ['admin', 'staff'], ],

        ];

        // Create the Roles
        foreach ($seedRoles as $newRole) {
            $role = Role::findOrCreate($newRole['name']);
        }

        // Create the Permissions and assign to roles
        foreach ($seedPermissions as $seedPermission) {
            $permission = Permission::findOrCreate($seedPermission['permission']);
            $permission->syncRoles($seedPermission['roles']);
        }
    }
}

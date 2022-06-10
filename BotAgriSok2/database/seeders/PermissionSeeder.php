<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;

class PermissionSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // spatie documentation
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'permission_index',
            'permission_create',
            'permission_show',
            'permission_edit',
            'permission_delete',

            'role_index',
            'role_create',
            'role_show',
            'role_edit',
            'role_delete',

            'adimin_index',
            'adimin_create',
            'adimin_show',
            'adimin_edit',
            'adimin_delete',

            'agriculteur_index',
            'agriculteur_create',
            'agriculteur_show',
            'agriculteur_edit',
            'agriculteur_delete',

            'agronomme_index',
            'agronomme_create',
            'agronomme_show',
            'agronomme_edit',
            'agronomme_delete',

            'culture_index',
            'culture_create',
            'culture_show',
            'culture_edit',
            'culture_delete',

            'parcelle_index',
            'parcelle_create',
            'parcelle_show',
            'parcelle_edit',
            'parcelle_delete',

            'personne_index',
            'personne_create',
            'personne_show',
            'personne_edit',
            'personne_delete',

            'proposition_index',
            'proposition_create',
            'proposition_show',
            'proposition_edit',
            'proposition_delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}

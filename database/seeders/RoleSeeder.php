<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar si el rol ya existe antes de intentar crearlo
        if (!Role::where('name', 'Super Admin')->exists()) {
            Role::create(['name' => 'Super Admin']);
        }

        // Crear los otros roles
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $productManager = Role::firstOrCreate(['name' => 'Product Manager']);
        $formulario = Role::firstOrcreate(['name' => 'formulario']);

        // Asignar permisos a los roles
        $admin->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'create-product',
            'edit-product',
            'delete-product',

        ]);

        $productManager->givePermissionTo([
            'create-product',
            'edit-product',
            'delete-product',

        ]);

        $formulario->givePermissionTo([
            'create-formulario',
            'edit-formulario',
            'delete-formlario',

        ]);

    }
}

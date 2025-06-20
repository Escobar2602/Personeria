<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'ver usuarios']);
        Permission::create(['name' => 'crear usuarios']);
        Permission::create(['name' => 'editar usuarios']);
        Permission::create(['name' => 'eliminar usuarios']);

        $roleAdmin = Role::create(attributes: ['name' => 'admin']);
        $roleEstudiante = Role::create(['name' => 'estudiante']);
        $rolePersonero = Role::create(['name' => 'personero']);

        $permissions = Permission::all();
        $roleAdmin->syncPermissions($permissions);

        $userAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
        $userAdmin->assignRole($roleAdmin);

        // $userEstudiante = User::create([
        //     'name' => 'Estudiante',
        //     'email' => 'estudiante@gmail.com',
        //     'password'=> bcrypt('12345678'),
        // ]);
        // $userEstudiante->assignRole($roleEstudiante);

        $userPersonero = User::create([
            'name' => 'Personero',
            'email' => 'personero@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
        $userPersonero->assignRole($rolePersonero);
    }
}

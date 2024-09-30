<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Config;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([RoleSeeder::class]);

        //  // Create Administrator role if it doesn't exist
        //  $adminRole = Role::firstOrCreate(['name' => 'admin']);

        //  // Create Administrator user with secure password
        //  $admin = User::create([
        //      'name' => 'Administrador',
        //      'email' => 'admin@admin.com',
        //      'password' => bcrypt('your_secure_password'), // Replace with a secure password
        //  ]);

        //  // Assign Administrator role to the user
        //  $admin->assignRole($adminRole);

        User::create([
            'name'=>'Administrador',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('admin');

        User::create([
            'name'=>'Secretaria',
            'email'=>'secretaria@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres'=> 'Secretaria',
            'apellidos' => '1',
            'ci'=>'11111',
            'celular'=>'777777',
            'fecha_nacimiento' => '10/10/2022',
            'direccion' => 'z/Pompeya',
            'user_id'=>'2'
        ]);

        User::create([
            'name'=>'Doctor1',
            'email'=>'doctor1@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'=>'Doctor1',
            'apellidos'=>'morales',
            'telefono'=>'789765',
            'licencia_medica'=>'8768690',
            'especialidad'=>'pediatria',
            'user_id'=>'3'
        ]);

        User::create([
            'name'=>'Doctor2',
            'email'=>'doctor2@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'=>'Doctor2',
            'apellidos'=>'chavez',
            'telefono'=>'5346346',
            'licencia_medica'=>'6436425',
            'especialidad'=>'odontologia',
            'user_id'=>'4'
        ]);

        User::create([
            'name'=>'Doctor3',
            'email'=>'doctor3@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'=>'Doctor3',
            'apellidos'=>'villa',
            'telefono'=>'73846346',
            'licencia_medica'=>'78436425',
            'especialidad'=>'fisioterapia',
            'user_id'=>'5'

        ]);

        Consultorio::create([
            'nombre'=>'pediatria',
            'ubicacion'=>'3-1a',
            'capacidad'=>'10',
            'telefono'=>'764876',
            'especialidad'=>'pediatria',
            'estado'=>'activo',
        ]);

        Consultorio::create([
            'nombre'=>'fisioterapia',
            'ubicacion'=>'2-1a',
            'capacidad'=>'4',
            'telefono'=>'3468723',
            'especialidad'=>'fisioterapia',
            'estado'=>'activo',
        ]);

        Consultorio::create([
            'nombre'=>'odontologia',
            'ubicacion'=>'3-1a',
            'capacidad'=>'5',
            'telefono'=>'655356',
            'especialidad'=>'odontologia',
            'estado'=>'activo',
        ]);

        User::create([
            'name'=>'Paciente1',
            'email'=>'paciente1@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('paciente');

        User::create([
            'name'=>'Usuario1',
            'email'=>'Usuario1@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('usuario');


        $this->call([PacienteSeeder::class]);

        //Creacion de horarios
        Horario::create([
            'dia'=>'LUNES',
            'hora_inicio'=>'08:00:00',
            'hora_fin'=>'14:00:00',
            'doctor_id'=>'1',
            'consultorio_id'=>'1'
        ]);

        Config::create([
            'nombre'=>'clinica',
            'direccion' => 'zona pompeya',
            'telefono' => '3948727 - 3634643',
            'correo' => 'asdf@gmail.com',
            'logo' => 'logos/8IyW8eTyJfFKOjS8YIHpyOz7iwFEVdVPGHZqPlSY.jpg'
        ]);
    }
}

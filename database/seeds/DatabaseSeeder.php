<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Tipo;
use \App\Causa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            'name' => 'jorge',
            'nombres_completos' => '-----',
            'email' => 'jorge@gmail.com',
            'password' => bcrypt('acuario20'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'carlos',
            'nombres_completos' => 'carlos christian benavides montenegro',
            'email' => 'carlos@gmail.com',
            'password' => bcrypt('acuario20')
        ]);

        $causas = [
            'Causas relacionadas con las instalaciones',
            'Problemas de diseño',
            'Consideraciones severas del medio ambiente',
            'Mala regulación',
            'Repuestos no adecuados o de mala calidad',
            'Accidente',
            'Falta de mantenimiento preventivo',
            'Desgaste por uso',
            'Operación o uso inadecuado'
        ];

        $tipos = [
            'Sistema eléctrico',
            'Válvula',
            'Sistema mecánico',
            'Perdida de capacidad',
            'Fugas',
            'Indeci',
            'Sistema de combustión',
            'Recarga de gas',
            'Temperatura',
            'Perillas de control',
            'Empaquetaduras',
            'Corto circuito',
            'Equipo congelado',
            'Regulación de control'
        ];


        foreach ($causas as $causa) {
            # code...
            Causa::create([
                'description' => $causa,
            ]);
        }
        foreach ($tipos as $tipo) {
            # code...
            Tipo::create([
                'description' => $tipo,
            ]);
        }
    }
}

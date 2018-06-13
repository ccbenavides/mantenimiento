<?php

use Faker\Generator as Faker;

$factory->define(App\Orden::class, function (Faker $faker) {
    return [
        'fecha' => $faker->date($format = 'Y-m-d', $max = 'now') ,
        'hora_inicio' => $faker->time($format = 'H:i:s', $max = 'now') ,
        'hora_termino' => $faker->time($format = 'H:i:s', $max = 'now') ,
        'tipo' => $faker->randomElement($array = array ('MP','MC','MB'))  ,
        'hora_parada' => $faker->time($format = 'H:i:s', $max = 'now') ,
        'hora_arranque' => $faker->time($format = 'H:i:s', $max = 'now') ,
        'requerimiento' => $faker->catchPhrase ,
        'equipo' => $faker->jobTitle ,
        'descripcion' => $faker->text($maxNbChars = 500)  ,
        'codigo' => $faker->numberBetween($min = 1000, $max = 9000) ,
        'numero_orden' => $faker->numberBetween($min = 1000, $max = 9000) ,
        'estado' => "completado",
        'user_id' => 2,
        'tienda_id' => $faker->numberBetween(1, 7)
    ];
});

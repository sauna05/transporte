<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Agregar registros de prueba
        Vehicle::create([
            'type' => 'Camión',
            'capacity' => 10000, // Capacidad en kg
            'imagen'=>null,
          
        ]);

        Vehicle::create([
           'type'=>'Toyota',
           'capacity'=>2000,
           'imagen'=>null,
        ]);

        Vehicle::create([
            'type' => 'Furgoneta',
            'capacity' => 1500, // Capacidad en kg
            'imagen'=>null,
       
        ]);

        Vehicle::create([
            'type' => 'Camioneta',
            'capacity' => 5000, // Capacidad en kg
            'imagen'=>null,
           
        ]);
    }
}
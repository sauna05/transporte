<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['origin', 'destination', 'distance', 'status','price'];

    // Relación de muchos a muchos con conductores
    public function drivers()
    {
        return $this->belongsToMany(Driver::class, 'driver_route');
    }

    // Relación de muchos a muchos con vehículos
    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'driver_route');
    }

    // Relación con los pedidos
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

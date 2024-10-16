<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'phone_number'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    // Definición de la relación con el usuario
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
}

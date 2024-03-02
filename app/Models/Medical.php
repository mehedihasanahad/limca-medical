<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medical extends Model
{
    use HasFactory;
    
    public static function List(){
        return Medical::get();
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'user_medicals');
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Animal;

class Species extends Model
{
    public function animals(){
        $this->hasMany(Animal::class);
    }

    public function doctors(){
        $this->hasMany(Doctor::class);
    }
}

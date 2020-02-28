<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Animal;

class Breed extends Model
{
    public function animals(){
        return $this->hasMany(Animal::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Animal;

class Breed extends Model
{
    public function animals(){
        $this->hasMany(Animal::class);
    }
}

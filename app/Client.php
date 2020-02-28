<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Animal;

class Client extends Model
{
    public function animals(){
        return $this->hasMany(Animal::class);
    }
}

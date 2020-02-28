<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Species;

class Doctor extends Model
{
    public function species(){
        return $this->hasMany(Species::class);
    }
}

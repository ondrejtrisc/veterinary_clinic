<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Species;

class Doctor extends Model
{
    public function species(){
        $this->hasMany(Species::class);
    }
}

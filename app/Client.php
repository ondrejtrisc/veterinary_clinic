<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Animals;

class Client extends Model
{
    public function animals(){
        $this->hasMany(Animals::class);
    }
}

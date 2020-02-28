<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\Breed;

class Animal extends Model
{
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function breed(){
        return $this->belongsTo(Breed::class);

    }

    public function species(){

        return $this->belongsTo(Species::class, 'cpecies_id');
    }
}

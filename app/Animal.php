<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\Breed;

class Animal extends Model
{
    public function client(){
        $this->belongsTo(Client::class);
    }

    public function breed(){
        $this->belongsTo(Breed::class);

    }

    public function species(){

        $this->belongsTo(Species::class, 'cpecies_id');
    }
}

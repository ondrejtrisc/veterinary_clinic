<?php

require_once 'DB.php';
require_once 'DB_functions.php';

connect('localhost', 'clinic', 'root', 'rootroot');

DB::statement('TRUNCATE TABLE `clients`');
DB::statement('TRUNCATE TABLE `animals`');
DB::statement('TRUNCATE TABLE `doctors`');
DB::statement('TRUNCATE TABLE `species`');
DB::statement('TRUNCATE TABLE `breeds`');

$string = file_get_contents("clients.json");
$json_a = json_decode($string, true);

$breed_id = 1;

foreach ($json_a as $item){
  // var_dump($item['first_name']);
  $client_fn = $item['first_name'];
  $client_sn = $item['surname'];

  DB::insert("INSERT
  INTO `clients`
  (`first_name`, `surname`, `address`, `email`, `phone`)
  VALUES (?, ?, ?, ?, ?)"
  , [
    $client_fn, 
    $client_sn,
    NULL,
    NULL,
    NULL
  ]);
  $client_id = last_insert_id();


  foreach ($item['pets'] as $pet){
    $breed = $pet['breed'];   //
    if(isset($breeds[$breed])){
      $pet_breed = $breeds[$breed];   //
    }else{
      $breeds[$breed] = $breed_id++;
      $pet_breed = $breeds[$breed];   //
      DB::insert("INSERT
      INTO `breeds`
      (`name`)
      VALUES (?)", [
        $breed
        ]);
  
    }

    // DB::statement("SELECT * FROM `breeds` WHERE `name`= $breed");



    $pet_name = $pet['name'];
    $pet_client_id = $client_id;
    $pet_weight = $pet['weight'];
    $pet_age = $pet['age'];
    $pet_photo = $pet['photo'];

    // var_dump($pet['age']);


    DB::insert("INSERT
    INTO `animals`
    (`name`, `client_id`, `cpecies_id`, `breed_id`, `age`, `weight`, `photo`)
    VALUES (?, ?, ?, ?, ?, ?, ?)", [
      $pet_name, 
      $pet_client_id, 
      NULL,
      $pet_breed, 
      $pet_age, 
      $pet_weight, 
      $pet_photo
      ]);
  }
}

// var_dump($breeds);
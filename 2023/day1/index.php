<?php

require_once("input.php");


function return_number($word){
    
    $caracters = str_split($word);
    $caracters_reverse = array_reverse($caracters);
    $first_digit = 0;
    $second_digit = 0;

    foreach($caracters as $caracter){
       if(is_numeric($caracter)){
            $first_digit = $caracter;
            break;
       } 
    }

    foreach($caracters_reverse as $caracter){
        if(is_numeric($caracter)){
             $second_digit = $caracter;
             break;
        } 
     }

     $number = $first_digit . $second_digit;
     return $number;
}

$array = explode("\n", $input);
$suma = 0;
foreach($array as $date){
    $suma += intval(return_number($date));
}

echo "total = " . $suma;
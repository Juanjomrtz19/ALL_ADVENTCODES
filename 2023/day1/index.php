<?php

require_once("input.php");

//PART 1
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



//PART 2
function number_part2($word){
     
     $word = strtolower($word);

     $words_numbers = [
          "one" => 1,
          "two" => 2,
          "three" => 3,
          "four" => 4,
          "five" => 5,
          "six" => 6,
          "seven" => 7,
          "eight" => 8,
          "nine" => 9
     ];

     $numbers_pos = ["one" => null, 
     "two" => Array(), 
     "three" => Array(),
     "four" => Array(),
     "five" => Array(),
     "six" => Array(),
     "seven" => Array(),
     "eight" => Array(),
     "nine" => Array(),
     "1" => Array(),
     "2" => Array(),
     "3" => Array(),
     "4" => Array(),
     "5" => Array(),
     "6" => Array(),
     "7" => Array(),
     "8" => Array(),
     "9" => Array()];
     
     
     $position = Array();
     foreach($numbers_pos as $number => &$pos){
          $position = get_ocurrences($word, $number);
          if(!empty($position)){
               $pos = $position;
          }
     }

     //print_r($numbers_pos);
     /*
     $numero = minimun($numbers_pos);
     echo("Numero: " . $numero . "\n");
     */
     
     if(contar_pos($numbers_pos) >= 2){
          $first_digit = minimun($numbers_pos);
          $second_digit = maximun($numbers_pos);

          if(!is_numeric($first_digit)){
               $first_digit = $words_numbers[$first_digit];
          }

          if(!is_numeric($second_digit)){
               $second_digit = $words_numbers[$second_digit];
          }

          $true_number = $first_digit . $second_digit;
          return $true_number;
     }

     elseif(contar_pos($numbers_pos) === 1){
          $unique_digit = minimun($numbers_pos);
          $true_number = $unique_digit . $unique_digit;
          return $true_number;
     }
     //print_r($numbers_pos);
     
}

function minimun($dictionary){
     $min = 10000000;
     $word = "";
     foreach($dictionary as $number => $pos){
          if(!empty($pos)){
               foreach($pos as $p){
                    if($p < $min){
                         $min = $p;
                         $word = $number;
                    }
               }
          }
          //print($word . "\n");
     }

     return $word;
}

function maximun($dictionary){
     $max = -1;
     $word = "";
     foreach($dictionary as $number => $pos){
          if(!empty($pos)){
               foreach($pos as $p){
                    if($p > $max){
                         $max = $p;
                         $word = $number;
                    }
               }
          }
     }

     return $word;
}

function contar_pos($dictionary){
     $contador = 0;
     foreach($dictionary as $number => $pos){  
          if(!empty($pos)){
               foreach($pos as $p){
                    $contador+=1;     
               }
          }     
     }
     return $contador;
}

function get_ocurrences($cadena, $subcadena) {
     $posiciones = array();
     while(strpos($cadena, $subcadena) !== FALSE){
          array_push($posiciones, strpos($cadena, $subcadena));
          $cadena = remove_first_ocurrence($cadena, $subcadena);
          //echo($cadena);
     }
     return $posiciones;
 }

 function remove_first_ocurrence($cadena, $subcadena) {
     $posicion = strpos($cadena, $subcadena);
 
     if ($posicion !== false) {
         $cadena = substr_replace($cadena, '*', $posicion, 1);
     }
 
     return $cadena;
 }

$array = explode("\n", $input);
$suma = 0;

foreach($array as $date){
     number_part2($date);
     echo (number_part2($date). "\n");
     $suma += intval(number_part2($date));
}


echo $suma . "\n";



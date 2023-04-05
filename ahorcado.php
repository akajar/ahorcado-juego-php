<?php
//Inicializando variables
$possible_words = ["algoritmo", "cerveza", "jamonada", "cerebro", 
    "capibara", "independencia", "dinosaurio", "responsabilidad",
    "intelectual", "esperanza"];

const MAX_ATTEMPS = 5;

$choosen_word = $possible_words[rand(0,count($possible_words))];

$hidden_word = str_repeat("_",strlen($choosen_word));

$fails = 0;
//Desarrollo del juego
echo "--- JUEGO DEL AHORCADO ---\n";
echo "Adivina esta palabra:\n";

while(1){
    $attemps = (MAX_ATTEMPS - $fails);
    if($attemps == 0){
        echo "No te quedan intentos. PERDISTE\n";
        echo "La respuesta era: ";
        break;
    }
    echo $hidden_word."\n";
   
    echo "Tienes {$attemps} intentos\n";
    $letter = readline("Ingresa una letra: ");
    
    if(strpos($choosen_word,$letter) === false){ // desde php 8 usar str_contains()
        echo "No hay coincidencias\n\n";
        $fails++;
        continue;
    }

    echo "\n";
    for ($i=0, $size = strlen($hidden_word); $i < $size ; $i++) { 
        if($choosen_word[$i] == $letter) $hidden_word[$i] = $letter;
    }

    if(strpos($hidden_word, "_") === false) break;
}

echo $choosen_word."\n";
echo "FIN DEL JUEGO :D\n";
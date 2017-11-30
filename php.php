<?php

include "pieces.php";

$fibonacci_seeds = array(0,1);
$chosen_pieces = array();
for ($i = 2; $i < strlen($pieces[0]); $i++) { 
    $fibonacci_seeds[$i] = $fibonacci_seeds[$i-1] + $fibonacci_seeds[$i-2];
    $chosen_pieces[] = get_piece_at_index($pieces, $fibonacci_seeds[$i-2]);
}
$encoded_string = implode("=", $chosen_pieces);
echo implode("=", $chosen_pieces);

function get_piece_at_index($pieces, $index) {
    return ($index > count($pieces)) ? "" : $pieces[$index];
}

?>

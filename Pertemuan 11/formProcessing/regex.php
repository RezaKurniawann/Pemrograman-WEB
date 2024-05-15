<?php

// langkah no 2

// $pattern = '/[a-z]/'; //cocokkan huruf kecil.
// $text = 'This is a Sample Text.';

// if (preg_match($pattern, $text)) {
//     echo "Huruf kecil ditemukan!";
// } else {
//     echo "Tidak ada huruf kecil!";
// }

// langkah no 6
// $pattern = '/[0-9]+/'; //cocokkan satu atau lebih digit
// $text = 'There are 123 apples.';

// if (preg_match ($pattern, $text, $matches)) {
//     echo "Cocokkan : " . $matches[0];
// } else  {
//     "Tidak ada yang cocok!";
// }

//langkah no 10

// $pattern = '/apple/';
// $replacement = 'banana';
// $text = 'I like apple pie.';
// $new_text = preg_replace ($pattern, $replacement, $text);
// echo $new_text; // output : "ilike banana pie"

//langkah no 14
// $pattern = '/go*d/';
// $text = 'god is good.';
// if (preg_match ($pattern, $text, $matches)) {
//     echo "Cocokkan : " . $matches[0];
// } else {
//     echo " tidak ada yang cocok!";
// }

//langkah no 17
// $pattern = '/go?d/';
// $text = 'god is good.';
// if (preg_match ($pattern, $text, $matches)) {
//     echo "Cocokkan : " . $matches[0];
// } else {
//     echo " tidak ada yang cocok!";
// }

//langkah no 18
$pattern = '/go{0,1}d/';
$text = 'god is good.';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan : " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}

?>
<?php
$pattern = '/[a-z]/'; // Cocokkan huruf kecil.
$text = 'This is a Sample Text.';
if (preg_match($pattern, $text)) {
    echo "Huruf kecil ditemukan!";
} else {
    echo "<br>Tidak ada huruf kecil!";
}


$pattern = '/[0-9]+/';
$text = 'There are 123 apples.';
if (preg_match($pattern, $text, $matches)) {
    echo "<br>Cocokkan: " . $matches[0];
} else {
    echo "<br>Tidak ada yang cocok!";
}


$pattern = '/apple/';
$replacement = 'banana';
$text = '<br> I Like apple pie.';
$new_text = preg_replace($pattern, $replacement, $text);
echo $new_text; // output: "I Like banana pie."


$pattern = '/go?d/'; // Cocokkan "god", "good", "gooood", dll.
$text = 'god is good.';
if (preg_match($pattern, $text, $matches)) {
    echo "<br> Cocokkan: " . $matches[0];
} else {
    echo "<br> tidak ada yang cocok!";
}


$pattern = '/go{3,4}d/'; // cocokkan "god", "good", "gooood", dll.
$text = 'god is good';
if (preg_match($pattern, $text, $matches)) {
    echo "<br>Cocokkan: " . $matches[0];
} else {
    echo "<br>Tidak ada yang cocok!";
}

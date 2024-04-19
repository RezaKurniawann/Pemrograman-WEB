<?php
// soal no 9
$lorem = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis corporis tempore quos animi laudantium voluptatem minima sint quasi fugiat odio nisi earum ut, molestiae fuga assumenda reiciendis, totam porro illo?.";

echo "<p>{$lorem}</p>";
echo "Panjang karakter: ". strlen($lorem). "<br>";
echo "Panjang kata: ". str_word_count($lorem). "<br>";
echo "<p>" . strtoupper($lorem) . "</p>";
echo "<p>" . strtolower($lorem) . "</p>";

?>
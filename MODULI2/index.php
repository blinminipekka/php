<?php 

$emri = "blini";
$mosha = 15;
$numri = 4.5;
$boolean = true;

echo $emri."<br>"; 

echo $mosha."<br>";

echo $numri."<br>";

echo $boolean."<br>";

$sentence = "Today is thursday";
echo str_replace("thursday", "not thursday", $sentence)."<br>";
echo strlen($sentence)."<br>";
echo str_word_count($sentence)

?>
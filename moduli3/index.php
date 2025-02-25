<?php 

$students = ["Blini", "Erjoni" , "Aniki", "Edeni" , "Shpati" , "Nili"];

$string = "String";


$grade = 94;

if ($grade >= 90 && $grade <= 100){
    echo("5");
}
elseif ($grade >= 70 && $grade <= 90){
    echo("4");
}
elseif ($grade >= 50 && $grade <= 70){
    echo("3");
}

elseif ($grade >= 30 && $grade <= 50){
    echo("2");
}

else{
    echo("1");
}

$dita = "monday";

switch($dita){

    case"monday":
        echo"nuk ki kurs";
        break;
    case"tuesday":
            echo"ki kurs";
            break;
    case"wednesday":
            echo"nuk ki kurs";
            break;
    case"thursday":
            echo"ki kurs";
            break;
    case"friday":
            echo"nuk ki kurs";
            break;
    case"satruday":
            echo"nuk ki kurs";
            break;
    case"sunday":
            echo"nuk ki kurs";
            break;
    default:
        echo"invalid";
}

for($x = 50; $x < 100; $x = $x + 2){
    echo $x."<br>";
}
echo "<br>";
foreach($students as $student){
    echo($student."<br>");
}

while (strlen($string) < 10){
    echo ($string);
    $string = $string . "g";
}


?>
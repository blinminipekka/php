<?php 

$grade = 94;

if ($grade >= 90 && $grade =< 100){
    echo("5");
}
elseif ($grade >= 70 && $grade =< 90){
    echo("4");
}
elseif ($grade >= 50 && $grade =< 70){
    echo("3");
}

elseif ($grade >= 30 && $grade =< 50){
    echo("2");
}

else{
    echo("1")
}


?>
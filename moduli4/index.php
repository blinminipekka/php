<?php

function sum ($numri1, $numri2){
    if ($numri1 > $numri2){
        return $numri1;
    }
    elseif ($numri1 == $numri2){
        return -1;
    }
    else{
        return $numri2;
    }
}

$shuma = sum(8,9);
echo ($shuma);

echo ("<br>"); 

function qift ($numr){
    if($numr % 2 == 0){
        return "qift";
    }
    else{
        return "tek";
    }
}
$numriii = qift(5);
echo ($numriii);


?>
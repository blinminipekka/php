<?php



$employees = array(
    array(
        "name" => "nil",
        "age" => "15",
        "position" => "janitor"
    ),
    array(
        "name" => "anik",
        "age" => "16",
        "position" => "employee"
    ),
    array(
        "name" => "eden",
        "age" => "16",
        "position" => "ceo"
    ),
    );







$products = array(
    array(
        "product" => "milk",
        "cost" => 4
    ),
    array(
        "product" => "eggs",
        "cost" => 2
    ),
    array(
        "product" => "flour",
        "cost" => 7
    ),
    );



function calculate($product){
    $sum = 0;
    foreach($product as $item){

        
            $sum += $item["cost"];
    }
        return $sum;
            
    }


echo calculate($products);

?>
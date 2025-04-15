<?php

include_once('config.php');
$sql = "SELECT * FROM products";
$selectProducts = $conn->prepare($sql);
$selectProducts->execute();

$products_data=$selectProducts->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson 10</title>

    <style>
        table, td, th {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td, th {
            padding: 10px 20px;
        }
    </style>
</head>
<body>
        

  
        <table>
            <thead>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Quantity</th>

                <tbody>
            <?php
            foreach($products_data as $product){
                
            }
            ?>
            <tr>
                <td> <?= $product['id'] ?></td>
                <td> <?= $product['title'] ?></td>
                <td> <?= $product['description'] ?></td>
                <td> <?= $product['quantity'] ?></td>
                <td> <?= $product['price'] ?></td>
                <td> <?= "<a href='updateProduct.php?id=$product[id]'>Update</a"  ?>Update</td>
                <td> <?= "<a href='deleteProduct.php?id=$product[id]'>Delete</a"  ?>Delete</td>
            </tr>
        </tbody>

            </thead>
        </table>
            
        
    
        </table>
        <a href="index.php">Add User</a>
</body>
</html>
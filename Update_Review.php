<?php

include "inc/parts/db.php";

$ProductID =  $_POST['ID'];
$rating = $_POST['rating'];
$content = $_POST['content'];


$stmt5 = $conn->prepare ("INSERT INTO Review (StockItemID,Rating,Content) VALUES ($ProductID,$rating,'$content')");
$stmt5->execute();
$pdo = NULL;
header ("refresh:1; url=index.php");

?>
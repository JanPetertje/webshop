<?php

include "inc/parts/db.php";

$ProductID =  filter_var($_POST['ID']);
$rating = filter_var($_POST['rating']);
$content = filter_var($_POST['content']);


$stmt5 = $conn->prepare ("INSERT INTO Review (StockItemID,Rating,Content) VALUES ($ProductID,$rating,'$content')");
$stmt5->execute();
$pdo = NULL;
header ("refresh:1; url=index.php");

?>
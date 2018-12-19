<?php

$rating = $_POST['rating'];
$content = $_POST['content'];

$sql = "INSERT INTO Review (StockItemID,Rating,Content) VALUES ('$productid','$rating', $content)";

header ("refresh:1; url=productpage.php?productID=' . $ProductID . '");

?>
<?php

$rating = $_POST['value'];
$content = $_POST['content'];

$sql = "INSERT INTO Review (StockItemID,Rating,Content) VALUES ('$ProductID','$rating', $content)";

header ("refresh:1; url=productpage.php?productID=' . $ProductID . '");

?>
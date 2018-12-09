<?php
include "inc/parts/db.php";

// Product groups

$stmt = $conn->prepare("SELECT StockGroupName, StockGroupID FROM stockgroups");

if($stmt->execute()) {
    $productGroupNameResult = $stmt->fetchAll();
}

// Items per product group with limiters

if(isset($_GET["id"]) && !empty($_GET["id"])) {
    $stmt = $conn->prepare("SELECT StockGroupID FROM stockgroups WHERE StockGroupID = :id");

    $stmt->bindParam(":id", $_GET["id"]);

    if($stmt->execute()) {
        $stockGroupNameResult = $stmt->fetch();

        if($_GET["id"] != $stockGroupNameResult["StockGroupID"]) {
            header("location:ProductGroups.php");
        } else {
            $category = $_GET["id"];

            if(isset($_GET["limit"]) && !empty($_GET["limit"]) && $_GET["limit"] == 0) {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 15 OFFSET 0");
            } elseif (isset($_GET["limit"]) && !empty($_GET["limit"]) && $_GET["limit"] == 15) {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 15 OFFSET 15");
            } elseif (isset($_GET["limit"]) && !empty($_GET["limit"]) && $_GET["limit"] == 30) {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 15 OFFSET 30");
            } elseif (isset($_GET["limit"]) && !empty($_GET["limit"]) && $_GET["limit"] == 45) {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 15 OFFSET 45");
            } elseif (isset($_GET["limit"]) && !empty($_GET["limit"]) && $_GET["limit"] == 60) {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 15 OFFSET 60");
            } elseif (isset($_GET["limit"]) && !empty($_GET["limit"]) && $_GET["limit"] == 75) {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 15 OFFSET 75");
            } elseif (isset($_GET["limit"]) && !empty($_GET["limit"]) && $_GET["limit"] == 90) {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 15 OFFSET 90");
            } elseif (isset($_GET["limit"]) && !empty($_GET["limit"]) && $_GET["limit"] == 105) {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 15 OFFSET 105");
            }
            else {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 15 OFFSET 0");
            }

            $stmt->bindParam(":category", $category);

            if ($stmt->execute()) {
                $productGroupItemResult = $stmt->fetchAll();
            }
        }

    }
}

// Amount of pages needed

$stmt = $conn->prepare("SELECT COUNT(S.StockItemID) FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID WHERE G.StockGroupId = :category");

$stmt->bindParam(":category", $category);

if($stmt->execute()) {
    $pageResults = $stmt->fetch();
}

// Current stock group

$stmt = $conn->prepare("SELECT StockGroupName FROM stockgroups WHERE StockGroupID = :id");

$stmt->bindParam(":id", $category);

if($stmt->execute()) {
    $currentStockGroup = $stmt->fetch();
}

include "views/_productOverview.php";
<?php

include "inc/parts/db.php";

// Product groups for menu

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
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 0, 15");
            } elseif (isset($_GET["limit"]) && !empty($_GET["limit"]) && $_GET["limit"] == 15) {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 15, 30");
            } elseif (isset($_GET["limit"]) && !empty($_GET["limit"]) && $_GET["limit"] == 30) {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 30, 45");
            } elseif (isset($_GET["limit"]) && !empty($_GET["limit"]) && $_GET["limit"] == 45) {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 45, 60");
            } elseif (isset($_GET["limit"]) && !empty($_GET["limit"]) && $_GET["limit"] == 60) {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 60, 75");
            } elseif (isset($_GET["limit"]) && !empty($_GET["limit"]) && $_GET["limit"] == 75) {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 75, 90");
            } elseif (isset($_GET["limit"]) && !empty($_GET["limit"]) && $_GET["limit"] == 90) {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 90, 105");
            } elseif (isset($_GET["limit"]) && !empty($_GET["limit"]) && $_GET["limit"] == 105) {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 105, 120");
            } else {
                $stmt = $conn->prepare("SELECT SG.StockGroupID, S.StockItemName, S.RecommendedRetailPrice, S.StockItemID FROM stockitems S JOIN stockitemstockgroups G ON S.StockItemID = G.StockItemID JOIN stockgroups SG ON G.StockGroupID = SG.StockGroupID WHERE G.StockGroupId = :category LIMIT 0, 15");

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

include "views/_productOverview.php";
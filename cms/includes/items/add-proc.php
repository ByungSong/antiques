<?php
$pageTitle = 'Add Item Form Processor';

// Item Data
$itemTitle = mysqli_real_escape_string($conn, $_POST['title']);
$itemDescription = mysqli_real_escape_string($conn, $_POST['description']);
$isAvailable = $_POST['isAvailable'] == 'yes' ? 1 : 0;
$price = floatval($_POST['price']);
$year = intval($_POST['year']);

// Category Data
$categoryID = intval($_POST['categoryID']);
if ($categoryID == -1) {
  // Should be an error: No category selected
} elseif ($categoryID == 0) {
  // User wants to create a new category
  $categoryName = mysqli_real_escape_string($conn, $_POST['categoryName']);
  // INSERT CATEGORY
  $query = "INSERT INTO categories(categoryName) VALUES('$categoryName')";
  $result = mysqli_query($conn, $query);
  // SAVE NEW CAT ID FOR ITEM
  $categoryID = mysqli_insert_id($conn);
} else {
  // User has chosen an existing category
}

$compositionID = intval($_POST['compositionID']);
if ($compositionID == -1) {
  // Should be an error: No category selected
} elseif ($compositionID == 0) {
  $materialName = mysqli_real_escape_string($conn, $_POST['materialName']);
  // INSERT AND SAVE NEW COMPOSITION ID FOR ITEM
  $query = "INSERT INTO compositions(materialName) VALUES('$materialName')";
  $result = mysqli_query($conn, $query);
  $compositionID = mysqli_insert_id($conn);
} else {
  // User has chosen an existing category
}

$originID = intval($_POST['originID']);
if ($originID == -1) {
  // Should be an error: No category selected
} elseif ($originID == 0) {
  $place = mysqli_real_escape_string($conn, $_POST['place']);
  $era = mysqli_real_escape_string($conn, $_POST['era']);
  // INSERT AND SAVE NEW ORIGIN ID FOR ITEM
  $query = "INSERT INTO origins(place, era) VALUES('$place','$era')";
  $result = mysqli_query($conn, $query);
  $originID = mysqli_insert_id($conn);
} else {
  // User has chosen an existing category
}

// INSERT ITEM
$query = "INSERT INTO items(title, description, isAvailable, price, year, categoryID, compositionID, originID) VALUES('$itemTitle','$itemDescription',$isAvailable,$price,$year,$categoryID,$compositionID,$originID)";
$result = mysqli_query($conn, $query);
if (!$result) {
  // save the possible error for later use.
  // we need this because we are running another query just below
  $dbError = mysqli_error($conn);
}
$itemID = mysqli_insert_id($conn);

// Item Dimensions
$width = floatval($_POST['width']);
$height = floatval($_POST['height']);
$depth = floatval($_POST['depth']);
$weight = floatval($_POST['weight']);
$dimensionsDesc = mysqli_real_escape_string($conn, $_POST['dimensionsDesc']);
$query = "INSERT INTO dimensions(itemID,width,height,depth,weight,dimensionsDesc) VALUES ($itemID,$width,$height,$depth,$weight,'$dimensionsDesc')";
mysqli_query($conn, $query);
$dimensionsID = mysqli_insert_id($conn);

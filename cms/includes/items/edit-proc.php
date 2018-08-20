<?php

$itemID = intval($_POST['itemID']);
$itemTitle = mysqli_real_escape_string($conn, $_POST['title']);
$itemDescription = mysqli_real_escape_string($conn, $_POST['description']);
$isAvailable = $_POST['isAvailable'] == 'yes' ? 1 : 0;
$price = floatval($_POST['price']);
$year = intval($_POST['year']);

// Item Dimensions
$width = floatval($_POST['width']);
$height = floatval($_POST['height']);
$depth = floatval($_POST['depth']);
$weight = floatval($_POST['weight']);
$dimensionsDesc = mysqli_real_escape_string($conn, $_POST['dimensionsDesc']);
// Use the REPLACE query which will update the row if itemID exists. If itemID does not exist, it will insert a new row.
$query = "REPLACE INTO dimensions(itemID,width,height,depth,weight,dimensionsDesc) VALUES ($itemID,$width,$height,$depth,$weight,'$dimensionsDesc')";
mysqli_query($conn, $query);

if (!empty($_FILES)) {
  // use the realpath function to get the full directory name without dots. not required, but makes the final path more clear for debugging.
  $imagePath = realpath('..').'/img/items/' . $_FILES['image']['name'];
  move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
  $imageName = $_FILES['image']['name'];
  $query = "INSERT INTO images(itemID, imageName) VALUES($itemID, '$imageName')";
  mysqli_query($conn, $query);
  $imageID = mysqli_insert_id($conn);
  if (isset($_POST['isMainPic'])) {
    // make the inserted image the main pic
    $query = "UPDATE items SET mainImageID=$imageID WHERE itemID=$itemID";
    mysqli_query($conn, $query);
  }
}
/*
IF image has been selected for uploading:
  do the image upload (move uploaded file to img/items folder)
  save the image name to the database
*/

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

// EDIT ITEM
$query = "UPDATE items SET title='$itemTitle', description='$itemDescription', isAvailable=$isAvailable, price=$price, year=$year, categoryID=$categoryID, compositionID=$compositionID, originID=$originID WHERE itemID=$itemID";
$result = mysqli_query($conn, $query);


<?php

  $categoryID = intval($_POST['categoryID']);

  $categoryName = mysqli_real_escape_string($conn, $_POST['categoryName']);

  // EDIT category
  $query = "UPDATE categories SET categoryName='$categoryName' WHERE categoryID=$categoryID";

  $result = mysqli_query($conn, $query);
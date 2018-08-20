<?php

$categoryName = mysqli_real_escape_string($conn, $_POST['categoryName']);

$query = "INSERT INTO categories(categoryName) VALUES('$categoryName')";

$result = mysqli_query($conn, $query);

$categoryID = mysqli_insert_id($conn);
<?php

$materialName = mysqli_real_escape_string($conn, $_POST['materialName']);

$query = "INSERT INTO compositions(materialName) VALUES('$materialName')";

$result = mysqli_query($conn, $query);

$compositionID = mysqli_insert_id($conn);
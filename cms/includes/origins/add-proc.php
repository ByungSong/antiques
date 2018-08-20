<?php

$place = mysqli_real_escape_string($conn, $_POST['place']);
$era = mysqli_real_escape_string($conn, $_POST['era']);

$query = "INSERT INTO origins(place,era) VALUES('$place','$era')";

$result = mysqli_query($conn, $query);

$originID = mysqli_insert_id($conn);
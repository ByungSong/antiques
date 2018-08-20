<?php

  $originID = intval($_POST['originID']);

  $place = mysqli_real_escape_string($conn, $_POST['place']);
  $era = mysqli_real_escape_string($conn, $_POST['era']);

  // EDIT origin
  $query = "UPDATE origins SET place='$place', era='$era' WHERE originID=$originID";

  $result = mysqli_query($conn, $query);
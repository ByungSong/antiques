<?php

  $compositionID = intval($_POST['compositionID']);

  $materialName = mysqli_real_escape_string($conn, $_POST['materialName']);

  // EDIT composition
  $query = "UPDATE compositions SET materialName='$materialName' WHERE compositionID=$compositionID";

  $result = mysqli_query($conn, $query);
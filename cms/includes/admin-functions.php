<?php

/**
 * Define a function with four required arguments, plus an optional fifth argument.
 */
function dynamicMenuOptions($label, $table, $idColName, $labelColName, $selectedID=0) {
  // import the $conn global variable into the function scope
  global $conn;
  // create a local variable $result with the select query
  $result = mysqli_query($conn, "SELECT * FROM $table ORDER BY $labelColName");
  // loop through every row and print an option tag
  printf('<option value="-1">Select %s</option>', $label);
  printf('<option value="0">Add New %s</option>', $label);
  while($row = mysqli_fetch_array($result))
    printf('<option value="%s" %s>%s</option>',
      // the ID of the row replaces the first %s
      $row[$idColName],
      // the optional selected attribute. when false, the empty string replaces the second %s
      $selectedID == $row[$idColName] ? 'selected' : '',
      // the text of the menu option replaces the third %s
      $row[$labelColName]
    );
}
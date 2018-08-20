<?php
/*
IF itemID is in the URL:
  IF there is POST data:
    doing edit item proc
  ELSE:
    show edit item form
ELSE:
  IF there is POST data:
    doing add item proc
  ELSE:
    show add item form
*/
require('../conn/connAntiques.php');
require('includes/admin-functions.php');

// is there an itemID in the URL?
$isEditing = isset($_GET['itemID']);

// is there any POST data? i.e. has the user submitted a form?
$hasPostData = !empty($_POST);

if ($isEditing) {
  // if itemID is in the URL, go into "edit" mode.
  $pageTitle = "Edit Item $_GET[itemID]";
  if ($hasPostData) {
    // if the user submitted the form include the edit proc code.
    require('includes/items/edit-proc.php');
  }
} else {
  // if itemID is in the URL, go into "add" mode.
  $pageTitle = "Add New Item";
  if ($hasPostData) {
    // if the user submitted the form include the add proc code.
    require('includes/items/add-proc.php');
  }
}

// If user has submitted a form, create a result message
if ($hasPostData) {
  if (isset($validationError)) {
		$messageType = 'error';
		$message = "Form Validation Error: $validationError";    
  }
	elseif ($result) {
    // if we have a valid result...
    $messageType = 'success';
    // use a different success message for edits and adds
    $message = $isEditing ? 'You edits were successfully saved.' : "New item successfully created. <a href='item.php?itemID=$itemID'>Edit Item</a>.";
	} else {
    // if we do not have a result, it must have been an error
		$messageType = 'error';
		$message = 'Data could not be saved. '.(isset($dbError) ? $dbError : mysqli_error($conn));
	}
}

?><!DOCTYPE html>
<html lang="en-us">
<head>   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antiques Website | <?php echo $pageTitle; ?></title>
    <link href="css/cms.css" rel="stylesheet">
    <!-- Font Awesome for mag glass and other cool stuff -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
</head>
<body>
  <div id="container">
    
    <?php require('includes/menu.php'); ?>
    
    <h1><?= $pageTitle; ?></h1>
    
    <?php
      // if user has submitted a form, show the message created above
      if ($hasPostData):
    ?>
      <p class="message <?= $messageType; ?>"><?= $message; ?></p>
    <?php endif; ?>
  
    <?php
      // we always show one of the forms
      if ($isEditing) {
        require('includes/items/edit-form.php');
      } else {
        require('includes/items/add-form.php');
      }
    ?>
  </div>
  <script src="js/main.js"></script>
</body>
</html>
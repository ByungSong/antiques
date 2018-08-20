<?php
/*
IF categoryID is in the URL:
  IF there is POST data:
    doing edit category proc
  ELSE:
    show edit category form
ELSE:
  IF there is POST data:
    doing add category proc
  ELSE:
    show add category form
*/
require('../conn/connAntiques.php');

// is there an categoryID in the URL?
$isEditing = isset($_GET['categoryID']);

// is there any POST data? i.e. has the user submitted a form?
$hasPostData = !empty($_POST);

if ($isEditing) {
  // if categoryID is in the URL, go into "edit" mode.
  $pageTitle = "Edit Category $_GET[categoryID]";
  if ($hasPostData) {
    // if the user submitted the form include the edit proc code.
    require('includes/categories/edit-proc.php');
  }
} else {
  // if categoryID is in the URL, go into "add" mode.
  $pageTitle = "Add New Category";
  if ($hasPostData) {
    // if the user submitted the form include the add proc code.
    require('includes/categories/add-proc.php');
  }
}

// If user has submitted a form, create a result message
if ($hasPostData) {
	if ($result) {
    // if we have a valid result...
		if (mysqli_affected_rows($conn)) {
      // if some rows were affected, then everything is perfect
			$messageType = 'success';
      // use a different success message for edits and adds
			$message = $isEditing ? 'You edits were successfully saved.' : 'New category successfully created.';
		} else {
      // if no rows have been affected, issue a warning message
			$messageType = 'warning';
			$message = 'No new data was saved.';
		}
	} else {
    // if we do not have a result, it must have been an error
		$messageType = 'error';
		$message = 'Data could not be saved. '.mysqli_error($conn);
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
        require('includes/categories/edit-form.php');
      } else {
        require('includes/categories/add-form.php');
      }
    ?>
  </div>
</body>
</html>
<?php
/*
IF originID is in the URL:
  IF there is POST data:
    doing edit origin proc
  ELSE:
    show edit origin form
ELSE:
  IF there is POST data:
    doing add origin proc
  ELSE:
    show add origin form
*/
require('../conn/connAntiques.php');

// is there an originID in the URL?
$isEditing = isset($_GET['originID']);

// is there any POST data? i.e. has the user submitted a form?
$hasPostData = !empty($_POST);

if ($isEditing) {
  // if originID is in the URL, go into "edit" mode.
  $pageTitle = "Edit Origin $_GET[originID]";
  if ($hasPostData) {
    // if the user submitted the form include the edit proc code.
    require('includes/origins/edit-proc.php');
  }
} else {
  // if originID is in the URL, go into "add" mode.
  $pageTitle = "Add New Origin";
  if ($hasPostData) {
    // if the user submitted the form include the add proc code.
    require('includes/origins/add-proc.php');
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
			$message = $isEditing ? 'You edits were successfully saved.' : 'New origin successfully created.';
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
        require('includes/origins/edit-form.php');
      } else {
        require('includes/origins/add-form.php');
      }
    ?>
  </div>
</body>
</html>
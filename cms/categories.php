<?php
require('../conn/connAntiques.php');
$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);
?><!DOCTYPE html>
<html lang="en-us">
<head>   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antiques Website | List Of Categories</title>
    <link href="css/cms.css" rel="stylesheet">
    <!-- Font Awesome for mag glass and other cool stuff -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
</head>
<body>
  <div id="container">
    <?php require('includes/menu.php'); ?>
    
    <h1>List Of Categories</h1>

    <p><a href="category.php">Add New Category</a></p>
    
    <ol class="item-listing">
      
      <?php while ($row = mysqli_fetch_array($result)): ?>
      <li>
        <h2><a href="category.php?categoryID=<?= $row['categoryID']; ?>"><?= $row['categoryName']; ?></a></h2>
      </li>
      <?php endwhile; ?>
      
    </ol>
    
  </div>
</body>
</html>
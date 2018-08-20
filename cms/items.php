<?php
require('../conn/connAntiques.php');
$query = "SELECT items.*, imageName FROM items LEFT JOIN images ON mainImageID=imageID";
$result = mysqli_query($conn, $query);
?><!DOCTYPE html>
<html lang="en-us">
<head>   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antiques Website | List Of Items</title>
    <link href="css/cms.css" rel="stylesheet">
    <!-- Font Awesome for mag glass and other cool stuff -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
</head>
<body>
  <div id="container">
    <?php require('includes/menu.php'); ?>
    
    <h1>List Of Items</h1>

    <p><a href="item.php">Add New Item</a></p>
    
    <ol class="item-listing">
      
      <?php while ($row = mysqli_fetch_array($result)): ?>
      <li>
        <h2><a href="item.php?itemID=<?= $row['itemID']; ?>"><?= $row['title']; ?></a></h2>
        <p>
          <?php if ($row['mainImageID'] != 0) printf('<img src="../img/items/%s" alt="">', $row['imageName']); ?>
          Price: <?= $row['price']; ?>
          <br>
          Year: <?= $row['year']; ?>
        </p>
        <p><?= $row['description']; ?></p>
      </li>
      <?php endwhile; ?>
      
    </ol>
    
  </div>
</body>
</html>
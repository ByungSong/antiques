<?php
require_once('conn/connAntiques.php');
$itemID = intval($_GET['itemID']);
$query = "
  SELECT * FROM items
  LEFT JOIN dimensions ON items.itemID=dimensions.itemID
  LEFT JOIN compositions ON items.compositionID=compositions.compositionID
  LEFT JOIN origins ON items.originID=origins.originID
  LEFT JOIN categories ON items.categoryID=categories.categoryID
  WHERE items.itemID=$itemID";
$result = mysqli_query($conn, $query);
$item = mysqli_fetch_array($result);

if ($item) {
  $query = "SELECT * FROM images WHERE itemID=$itemID";
  $imgResult = mysqli_query($conn, $query);  
}

$pageTitle = $item ? $item['title'] : 'Not Found';
?><!DOCTYPE html>
<html lang="en-us">
<head>   
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Antiques Website | <?php echo $pageTitle; ?></title><!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <link href="css/item.css" rel="stylesheet">
</head>
<body>
  <div id="container" class="container">
    <header class="page-header">
      <h1><a href="index.php">Antiques Gallery</a></h1>
    </header>
    <article id="item-container">
      <?php if ($item): ?>
      <aside id="item-slideshow" class="slideshow">
        <?php if (mysqli_num_rows($imgResult)): ?>
        <?php while ($img = mysqli_fetch_array($imgResult)): ?>
        <img src="img/items/<?= $img['imageName']; ?>" alt="">
        <?php endwhile; else: // if no images, then add a placeholder image ?>
        <!-- placeholder image -->
        <?php endif; // end if has images ?>
      </aside>
      <main>
        <h2><?= $item['title']; ?></h2>
        <p class="attributes">
          <strong>Price: </strong><span>$<?= number_format($item['price']); ?></span>
          <br>
          <strong>Year: </strong><span><?= number_format($item['year']); ?></span>
          <br>
          <strong><?= $item['isAvailable'] == 1 ? 'For Sale' : 'Sold'; ?></strong>
          <br>
          <strong>Category: </strong><a href="category.php?categoryID=<?= $item['categoryID']; ?>"><?= $item['categoryName']; ?></a>
        </p>
        <p class="description"><?= nl2br(htmlspecialchars($item['description'])); ?></p>
        <div class="item-info">
          <h3>Dimensions</h3>
          <p class="dimensions">
            <strong>Width: </strong><span><?= number_format($item['width'], 2); ?> in.</span>
            <br>
            <strong>Height: </strong><span><?= number_format($item['height'], 2); ?> in.</span>
            <br>
            <strong>Depth: </strong><span><?= number_format($item['depth'], 2); ?> in.</span>
            <br>
            <strong>Weight: </strong><span><?= number_format($item['weight'], 2 ); ?> lbs.</span>
          </p>
          <h3>Composition</h3>
          <p class="composition">
            <strong>Material: </strong><span><?= $item['materialName']; ?></span>
          </p>
          <h3>Origin</h3>
          <p class="orgin">
            <strong>Era: </strong><span><?= $item['era']; ?></span>
          </p>
        </div>
      </main>
      <?php else: // if not item ?>
      <?php if (!$result) echo mysqli_error($conn).'<br>'; ?>
      <p>Item with ID <?= $itemID; ?> was not found.</p>
      <?php endif; // end if item ?>
    </article>
  </div>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
</body>
</html>
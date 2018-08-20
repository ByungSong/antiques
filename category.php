<?php
require_once('conn/connAntiques.php');
$categoryID = intval($_GET['categoryID']);
$query = "SELECT * FROM categories WHERE categoryID=$categoryID";
$result = mysqli_query($conn, $query);
$category = mysqli_fetch_array($result);

if ($category) {
  $query = "SELECT * FROM items JOIN images ON items.mainImageID=images.imageID WHERE categoryID=$categoryID";
  $itemsResult = mysqli_query($conn, $query);  
}

$pageTitle = $category ? "Category: $category[categoryName]" : 'Not Found';
?><!DOCTYPE html>
<html lang="en-us">
<head>   
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Antiques Website | <?php echo $pageTitle; ?></title><!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <link href="css/image-grid.css" rel="stylesheet">
</head>
<body>
  <div id="container" class="container">
    <header class="page-header">
      <h1><a href="index.php">Antiques Gallery</a></h1>
    </header>
    <main id="category-container">
      <?php if ($category): ?>
        <h2>Items In <?= $category['categoryName']; ?></h2>
        <section id="items-grid" class="image-grid">
          <?php if (!$itemsResult) echo mysqli_error($conn); ?>
          <?php while ($item = mysqli_fetch_array($itemsResult)): ?>
          <article class="item">
            <h3><a href="item.php?itemID=<?= $item['itemID']; ?>"><?= $item['title']; ?></a></h3>
            <img src="img/items/<?= $item['imageName']; ?>" alt="">
          </article>
          <?php endwhile; ?>
        </section>
      <?php else: ?>
      <?php if (!$result) echo mysqli_error($conn).'<br>'; ?>
      <p>Category with ID <?= $categoryID; ?> was not found.</p>
      <?php endif; ?>
    </main>
  </div>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
</body>
</html>
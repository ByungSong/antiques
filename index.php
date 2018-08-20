<?php
require_once('conn/connAntiques.php');

// get 5 random items with images
$query = "SELECT items.*, imageName FROM images, items WHERE items.mainImageID=images.imageID ORDER BY RAND() LIMIT 9";
$slidesResult = mysqli_query($conn, $query);

// get the categories that have items, and one image of an item that belongs to the category
$query = "SELECT categories.*, imageName FROM categories JOIN items ON categories.categoryID=items.categoryID AND mainImageID!=0 JOIN images ON mainImageID=imageID GROUP BY categories.categoryID";
// we add GROUP BY to avoid duplicates
$categoriesResult = mysqli_query($conn, $query);

$pageTitle = 'Welcome';
?><!DOCTYPE html>
<html lang="en-us">
<head>   
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Antiques Website | <?php echo $pageTitle; ?></title><!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"/>
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"/>

  <link href="css/image-grid.css" rel="stylesheet">
  <link href="css/home.css" rel="stylesheet">
</head>
<body>
  <div id="container" class="container">
    <header class="page-header">
      <h1>Antiques Gallery</h1>
    </header>
    
    <h2>Our Top Items</h2>
    <section id="home-slideshow" class="slideshow">
      <?php while ($item = mysqli_fetch_array($slidesResult)): ?>
      <article class="item">
        <h3><a href="item.php?itemID=<?= $item['itemID']; ?>"><?= $item['title']; ?></a></h3>
        <img src="img/items/<?= $item['imageName']; ?>" alt="">
      </article>
      <?php endwhile; ?>
    </section>
    
    <h2>Browse By Category</h2>
    <section id="category-grid" class="image-grid">
      <?php while ($cat = mysqli_fetch_array($categoriesResult)): ?>
      <article class="category">
        <h3><a href="category.php?categoryID=<?= $cat['categoryID']; ?>"><?= $cat['categoryName']; ?></a></h3>
        <img src="img/items/<?= $cat['imageName']; ?>" alt="">
      </article>
      <?php endwhile; ?>
    </section>
    
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
  <script src="js/home.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
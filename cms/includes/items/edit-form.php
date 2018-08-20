<?php
$itemID = intval($_GET['itemID']);
$query = "
  SELECT * FROM items
  LEFT JOIN dimensions ON items.itemID=dimensions.itemID
  WHERE items.itemID=$itemID";
$result = mysqli_query($conn, $query);
$item = mysqli_fetch_array($result);

$query = "SELECT * FROM images WHERE itemID=$itemID";
$imgResult = mysqli_query($conn, $query);

if ($item):
?>
<form method="post" action="" enctype="multipart/form-data">

	<p><label>Item ID: <input name="itemID" value="<?= $itemID; ?>" readonly></label></p>

	<p><label>Title: <input name="title" value="<?= $item['title']; ?>"></label></p>

	<p><label>Description: <textarea name="description"><?= htmlspecialchars($item['description']); ?></textarea></label></p>

	<p>Is Item Available: <label><input type="radio" name="isAvailable" value="yes" <?= $item['isAvailable'] == 1 ? 'checked' : ''; ?>> Yes</label> <label><input type="radio" name="isAvailable" value="no" <?= $item['isAvailable'] == 0 ? 'checked' : ''; ?>> No</label></p>

	<p><label>Price: <input name="price" type="number" value="<?= $item['price']; ?>" step="0.01"></label></p>

	<p><label>Year: <input name="year" type="number" value="<?= $item['year']; ?>"></label></p>

  <fieldset>
    <legend>Images</legend>
    <!-- SHOW IMAGES THAT HAVE BEEN UPLOADED -->
    <p><?php while ($img = mysqli_fetch_array($imgResult)) printf('<img src="../img/items/%s" alt="">', $img['imageName']); ?></p>
    
    <!-- ADD INPUT FIELD FOR IMAGES -->
    <p><input type="file" name="image" accept=".png, .jpg, .jpeg">
      <br><br>
    <label><input type="checkbox" name="isMainPic" value="yes" > Make it the main image?</label></p>
  </fieldset>
  
  <fieldset>
    <legend>Dimensions</legend>
    <p><label>Width (in): <input name="width" type="number" step="0.01" value="<?= $item['width']; ?>"></label></p>
    <p><label>Height (in): <input name="height" type="number" step="0.01" value="<?= $item['height']; ?>"></label></p>
    <p><label>Depth (in): <input name="depth" type="number" step="0.01" value="<?= $item['depth']; ?>"></label></p>
    <p><label>Weight (lbs): <input name="weight" type="number" step="0.01" value="<?= $item['weight']; ?>"></label></p>
    <p><label>Description: <textarea name="dimensionsDesc"><?= htmlspecialchars($item['dimensionsDesc']); ?></textarea></label></p>
  </fieldset>

  <fieldset>
    <legend>Category</legend>
    <select name="categoryID" class="has-create-inputs">
      <?php dynamicMenuOptions('Category', 'categories', 'categoryID', 'categoryName', $item['categoryID']); ?>
    </select>
    <br><br>
    <label>New Category Name: <input name="categoryName"></label>
  </fieldset>

  <fieldset>
    <legend>Composition</legend>
    <select name="compositionID" class="has-create-inputs">
      <?php dynamicMenuOptions('Composition', 'compositions', 'compositionID', 'materialName', $item['compositionID']); ?>
    </select>
    <br><br>
    <label>New Material Name: <input name="materialName"></label>
  </fieldset>

  <fieldset>
    <legend>Origin</legend>
    <select name="originID" class="has-create-inputs">
      <?php dynamicMenuOptions('Origin', 'origins', 'originID', 'era', $item['originID']); ?>
    </select>
    <br><br>
    <label>New Origin Place: <input name="place"></label><br>
    <label>New Origin Era: <input name="era"></label><br>
  </fieldset>

	<p><button>Save Edits</button></p>

</form>
<?php
else:
  // if $result is valid, the query ran OK but no item was found. else show the sql error.
  echo $result ? "Item with ID '$_GET[itemID]' was not found." : mysqli_error($conn);
endif;
<?php
$categoryID = intval($_GET['categoryID']);
$query = "SELECT * FROM categories WHERE categoryID=$categoryID";
$result = mysqli_query($conn, $query);
$category = mysqli_fetch_array($result);
if ($category):
?>
<form method="post" action="">

	<p><label>Category ID: <input name="categoryID" value="<?= $categoryID; ?>" readonly></label></p>

	<p><label>Category Name: <input name="categoryName" value="<?= $category['categoryName']; ?>"></label></p>

	<p><button>Save Edits</button></p>

</form>
<?php
else: echo "Category with ID '$_GET[categoryID]' was not found.";
endif;
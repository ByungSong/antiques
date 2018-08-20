<?php
$compositionID = intval($_GET['compositionID']);
$query = "SELECT * FROM compositions WHERE compositionID=$compositionID";
$result = mysqli_query($conn, $query);
$composition = mysqli_fetch_array($result);
if ($composition):
?>
<form method="post" action="">

	<p><label>Composition ID: <input name="compositionID" value="<?= $compositionID; ?>" readonly></label></p>

	<p><label>Material Name: <input name="materialName" value="<?= $composition['materialName']; ?>"></label></p>

	<p><button>Save Edits</button></p>

</form>
<?php
else: echo "composition with ID '$_GET[compositionID]' was not found.";
endif;
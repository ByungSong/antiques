<?php
$originID = intval($_GET['originID']);
$query = "SELECT * FROM origins WHERE originID=$originID";
$result = mysqli_query($conn, $query);
$origin = mysqli_fetch_array($result);
if ($origin):
?>
<form method="post" action="">

	<p><label>Origin ID: <input name="originID" value="<?= $originID; ?>" readonly></label></p>

	<p><label>Place: <input name="place" value="<?= $origin['place']; ?>"></label></p>
	<p><label>Era: <input name="era" value="<?= $origin['era']; ?>"></label></p>

	<p><button>Save Edits</button></p>

</form>
<?php
else: echo "Origin with ID '$_GET[originID]' was not found.";
endif;
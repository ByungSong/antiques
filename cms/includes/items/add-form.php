<form method="post" action="">

  <p><label>Title: <input name="title"></label></p>

  <p><label>Description: <textarea name="description"></textarea></label></p>

  <p>Is Item Available: <label><input type="radio" name="isAvailable" value="yes" checked> Yes</label> <label><input type="radio" name="isAvailable" value="no"> No</label></p>

  <p><label>Price: <input name="price" type="number" step="0.01"></label></p>

  <p><label>Year: <input name="year" type="number"></label></p>
  
  <fieldset>
    <legend>Dimensions</legend>
    <p><label>Width (in): <input name="width" type="number" step="0.01"></label></p>
    <p><label>Height (in): <input name="height" type="number" step="0.01"></label></p>
    <p><label>Depth (in): <input name="depth" type="number" step="0.01"></label></p>
    <p><label>Weight (lbs): <input name="weight" type="number" step="0.01"></label></p>
    <p><label>Description: <textarea name="dimensionsDesc"></textarea></label></p>
  </fieldset>

  <fieldset>
    <legend>Category</legend>
    <select name="categoryID" class="has-create-inputs">
      <?php dynamicMenuOptions('Category', 'categories', 'categoryID', 'categoryName'); ?>
    </select>
    <br><br>
    <label>New Category Name: <input name="categoryName"></label>
  </fieldset>

  <fieldset>
    <legend>Composition</legend>
    <select name="compositionID" class="has-create-inputs">
      <?php dynamicMenuOptions('Composition', 'compositions', 'compositionID', 'materialName'); ?>
    </select>
    <br><br>
    <label>New Material Name: <input name="materialName"></label>
  </fieldset>

  <fieldset>
    <legend>Origin</legend>
    <select name="originID" class="has-create-inputs">
      <?php dynamicMenuOptions('Origin', 'origins', 'originID', 'era'); ?>
    </select>
    <br><br>
    <label>New Origin Place: <input name="place"></label><br>
    <label>New Origin Era: <input name="era"></label><br>
  </fieldset>

  <p><button>Add Item</button></p>

</form>
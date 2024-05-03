<h2>Add New Unit</h2>

<form action="<?php echo site_url('units/add'); ?>" method="post">
<input type="text" id="unit_id" name="unit_id" value="<?php echo $status;?>" required><br><br>

    <label for="unit_name">Unit Name:</label><br>
    <input type="text" id="unit_name" name="unit_name" required><br><br>

    <label for="unit_hospital">Unit Hospital:</label><br>
    <input type="text" id="unit_hospital" name="unit_hospital" required><br><br>

    <button type="submit">Submit</button>
</form>
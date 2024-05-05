

<div class="container">

<div class="container" style="margin: 30px;">&nbsp;</div>

<h2>Add New Unit</h2>

<?php
$path = ( $status=='add')?'add':'edit/'.$status;
//var_dump($unit);
?>

<form action="<?php echo site_url('units/'.$path); ?>" method="post">
<input type="hidden" id="unit_id" name="unit_id" value="<?php echo $status;?>" required><br><br>

    <label for="unit_name">Unit Name:</label><br>
    <input type="text" id="unit_name" name="unit_name" required value="<?php echo ($unit['unit_name']==!null) ? $unit['unit_name'] :''; ?>"><br><br>

 <label for="u_public_name">Unit Name:</label><br>
    <input type="text" id="u_public_name" name="u_public_name" required value="<?php echo ($unit['u_public_name']==!null) ? $unit['u_public_name'] :''; ?>"><br><br>

    <label for="unit_hospital">Unit Hospital:</label><br>
    <input type="text" id="unit_hospital" name="unit_hospital" required value="<?php echo ($unit['unit_hospital']==!null) ? $unit['unit_hospital'] :''; ?>"><br><br>

    <button type="submit">Submit</button>
</form>

</div>
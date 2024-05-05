
<div class="container">

<?php if($status=="Add"){?>
    <h2>Add New Patient</h2>
<?php }else{ ?>

    <h2>Edit Patient</h2>

<?php } ?>

    <form action="<?php echo site_url('patients/manage'); ?>" method="post">

    <input type="hidden" class="form-control" id="p_id_pk" name="p_id_pk" value="<?php echo $status; ?>" required>

        <div class="form-group">
            <label for="p_nindt_id">New NINDT ID:</label>
            <input type="text" class="form-control" id="p_nindt_id" name="p_nindt_id" value="<?php echo isset($patient) ? $patient->p_nindt_id : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="p_old_nindt_id">Old NINDT ID:</label>
            <input type="text" class="form-control" id="p_old_nindt_id" name="p_old_nindt_id" value="<?php echo isset($patient) ? $patient->p_old_nindt_id : ''; ?>">
        </div>
        <div class="form-group">
            <label for="p_gender">Unit:</label>
            <select class="form-control" id="p_gender" name="p_gender" required>
                <?php 
                foreach ( $active_units as $active_unit){
                    echo "<option value='{$active_unit->u_public_name}' >{$active_unit->unit_name}</option>";
                }
                ?>

            </select>
        </div>
        <div class="form-group">
            <label for="p_name">Name:</label>
            <input type="text" class="form-control" id="p_name" name="p_name" value="<?php echo isset($patient) ? $patient->p_name : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="p_gender">Gender:</label>
            <select class="form-control" id="p_gender" name="p_gender" required>
                <option value="Male" <?php echo isset($patient) && $patient->p_gender == 'Male' ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo isset($patient) && $patient->p_gender == 'Female' ? 'selected' : ''; ?>>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="p_status">Status:</label>
            <input type="text" class="form-control" id="p_status" name="p_status" value="<?php echo isset($patient) ? $patient->p_status : ''; ?>">
        </div>
        <div class="form-group">
            <label for="p_nic">NIC:</label>
            <input type="text" class="form-control" id="p_nic" name="p_nic" value="<?php echo isset($patient) ? $patient->p_nic : ''; ?>">
        </div>
        <div class="form-group">
            <label for="p_tpnumber">TP Number: Multiple Numbers are devided by , comma</label>
            <input type="text" class="form-control" id="p_tpnumber" name="p_tpnumber" value="<?php echo isset($patient) ? $patient->p_tpnumber : ''; ?>">
        </div>
        <div class="form-group">
            <label for="p_email">Email:</label>
            <input type="email" class="form-control" id="p_email" name="p_email" value="<?php echo isset($patient) ? $patient->p_email : ''; ?>">
        </div>
        <div class="form-group">
            <label for="p_birthDate">Birth Date:</label>
            <input type="date" class="form-control" id="p_birthDate" name="p_birthDate" value="<?php echo isset($patient) ? $patient->p_birthDate : ''; ?>">
        </div>
        <div class="form-group">
            <label for="p_address">Address:</label>
            <input type="text" class="form-control" id="p_address" name="p_address" value="<?php echo isset($patient) ? $patient->p_address : ''; ?>">
        </div>
        <div class="form-group">
            <label for="p_assignedcategory">Assigned Category:</label>
            <input type="text" class="form-control" id="p_assignedcategory" name="p_assignedcategory" value="<?php echo isset($patient) ? $patient->p_assignedcategory : ''; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    
</div>
<header>
        <?php $this->load->view('templates/navbar'); ?>    
        </header>
<div class="container">



    <h2>Search Patient</h2>


<?php
?>

    <form class="container" action="<?php echo site_url('sessions/new'); ?>" method="post" >
    <div class="row">
    <div class="form-group">
            <label for="search">NINDT ID:</label>
            <input type="text" class="form-control" id="search" name="search" value="<?php echo isset($search) ? $search : ''; ?>" required>
        </div>
        </div>
            <button type="submit" class="btn btn-success">Search</button>
    </form>


    <form action="<?php echo site_url('sessions/step_01'); ?>" method="post" id="form2">

    <input type="hidden" class="form-control" id="p_id_pk" name="p_id_pk" value="<?php echo isset($filtered_data) ? $filtered_data->p_id_pk : ''; ?>" required>


        <div class="form-group">
            <label for="p_old_nindt_id">NINDT ID:</label>

            <select class="form-control" id="hds_type" name="hds_type" required>
                <option value=""></option>
                <?php foreach ($hds_types as $key=> $hds_type) { echo "<option value='{$key}'>{$hds_type}</option> ";  }?>
            </select>
            </div>


        <div class="form-group">
            <label for="p_old_nindt_id">NINDT ID:</label>
            <input type="text" class="form-control" id="p_nindt_id" name="p_nindt_id" value="<?php echo isset($filtered_data) ? $filtered_data->p_nindt_id : ''; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="p_old_nindt_id">Old NINDT ID:</label>
            <input type="text" class="form-control" id="p_old_nindt_id" name="p_old_nindt_id" value="<?php echo isset($filtered_data) ? $filtered_data->p_old_nindt_id : ''; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="p_gender">Unit:</label>
            <input type="text" class="form-control" id="p_unit" name="p_unit" value="<?php echo isset($filtered_data) ? $filtered_data->p_unit : ''; ?>" readonly>


        </div>
        <div class="form-group">
            <label for="p_name">Name:</label>
            <input type="text" class="form-control" id="p_name" name="p_name" value="<?php echo isset($filtered_data) ? $filtered_data->p_name : ''; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="p_gender">Gender:</label>
            <input type="text" class="form-control" id="p_gender" name="p_gender" value="<?php echo isset($filtered_data) ? $filtered_data->p_gender : ''; ?>" readonly>

        </div>
        <div class="form-group">
            <label for="p_status">Catergory :</label>
            <input type="text" class="form-control" id="p_assignedcategory" name="p_assignedcategory" readonly value="<?php echo isset($filtered_data) ? $filtered_data->p_assignedcategory : ''; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="p_nic">NIC:</label>
            <input type="text" class="form-control" id="p_nic" name="p_nic" readonly value="<?php echo isset($filtered_data) ? $filtered_data->p_nic : ''; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Create a Session</button>
    </form>


    
</div>
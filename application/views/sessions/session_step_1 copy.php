
<div class="container">



    <h2>Search Patient</h2>


<?php
echo $search;
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


    <form action="<?php echo site_url('sessions/step_01'); ?>" method="post">

    <input type="hidden" class="form-control" id="p_id_pk" name="p_id_pk" value="" required>


        <div class="form-group">
            <label for="p_old_nindt_id">NINDT ID:</label>
            <input type="text" class="form-control" id="p_old_nindt_id" name="p_old_nindt_id" value="<?php echo isset($filtered_data) ? $filtered_data->p_nindt_id : ''; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="p_old_nindt_id">Old NINDT ID:</label>
            <input type="text" class="form-control" id="p_old_nindt_id" name="p_old_nindt_id" value="<?php echo isset($filtered_data) ? $filtered_data->p_old_nindt_id : ''; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="p_gender">Unit:</label>
            <input type="text" class="form-control" id="p_old_nindt_id" name="p_old_nindt_id" value="<?php echo isset($filtered_data) ? $filtered_data->p_unit : ''; ?>" readonly>


        </div>
        <div class="form-group">
            <label for="p_name">Name:</label>
            <input type="text" class="form-control" id="p_name" name="p_name" value="<?php echo isset($filtered_data) ? $filtered_data->p_name : ''; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="p_gender">Gender:</label>
            <input type="text" class="form-control" id="p_name" name="p_name" value="<?php echo isset($filtered_data) ? $filtered_data->p_gender : ''; ?>" readonly>

        </div>
        <div class="form-group">
            <label for="p_status">Catergory :</label>
            <input type="text" class="form-control" id="p_status" name="p_status" value="<?php echo isset($filtered_data) ? $filtered_data->p_assignedcategory : ''; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="p_nic">NIC:</label>
            <input type="text" class="form-control" id="p_nic" name="p_nic" value="<?php echo isset($filtered_data) ? $filtered_data->p_nic : ''; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Create a Session</button>
    </form>


    
</div>
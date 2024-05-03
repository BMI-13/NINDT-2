<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<?php  ?>        

    <body>
        <header>
        <?php $this->load->view('templates/navbar'); ?>    
        </header>
        


<?php   
                        if (isset($is_notification) ) {
                            $this->load->view('templates/notification');
                        }
?>
<section class="container-fluid">
            <div class='row' id="my-main" >
                <div class='col-md-offset-1 col-md-10'>
                

                    <div class="panel panel-primary">
                        <div class="panel-heading">
    <div class="card-header">
     <h3> Add Machine</h3>
    </div>

</div>
</div>
<div class="container mt-48">
  <div class="card">
    <div class="card-body">
      
    <!-- This is the main form part for editing machine profile--------------------------------------------- -->
  <div class="container">

    <form action='<?php echo(site_url("machines/submitform")); ?>' method="post" class="form-horizontal" name="machineinput">
      <!-- Machine ID -->
      <div class="form-group">
        <label class="control-label col-md-2" for="machine_id">Machine ID:</label>
        <div class="col-md-10">      
          <input type="text" class="form-control" id="machine_id" name="machine_id" value="<?php echo $status;?>" required>
        </div>
      </div>
   <!-- Machine Public ID -->
      <div class="form-group">
        <label class="control-label col-md-2" for="machine_public_id">Machine Public ID:</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="machine_public_id" name="machine_public_id" value="<?php echo $machine->machine_public_id; ?>" required>
        </div>
      </div>
    

      <!-- Machine Serial -->
      <div class="form-group">
        <label class="control-label col-md-2" for="machine_unit">Unit:</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="machine_unit" name="machine_unit" value="<?php echo $machine->machine_unit; ?>" required>
        </div>
      </div>

  <!-- Machine Serial -->
      <div class="form-group">
        <label class="control-label col-md-2" for="machine_serial">Machine Serial:</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="machine_serial" name="machine_serial" value="<?php echo $machine->machine_serial; ?>" required>
        </div>
      </div>

      <!-- Manufacturer -->
      <div class="form-group">
        <label class="control-label col-md-2" for="machine_manufacturer">Manufacturer:</label>
        <div class="col-md-10">
            <input type="text" class="form-control" id="machine_manufacturer" name="machine_manufacturer" value="<?php echo $machine->machine_manufacturer; ?>">
        </div>
      </div>
      
      <!-- Model -->
      <div class="form-group">
        <label class="control-label col-md-2" for="machine_model">Model:</label>
        <div class="col-md-10">
            <input type="text" class="form-control" id="machine_model" name="machine_model" value="<?php echo $machine->machine_model; ?>">
        </div>
      </div>

      <!-- Active -->
      <?php if ($machine->machine_active) { $checked = 'checked'; } else { $checked = ''; } ?>
      <div class="form-group">
        <label class="control-label col-md-2" for="machine_active">Active:</label>
        <div class="col-md-10">
          <label class="checkbox-inline">
            <input type="checkbox" id="machine_active" name="machine_active" <?php echo $checked; ?>> Active
          </label>
        </div>
      </div>

      <!-- Starting Date -->
      <div class="form-group">
        <label class="control-label col-md-2" for="machine_starting_date">Starting Date:</label>
        <div class="col-md-10">
          <input type="date" class="form-control" id="machine_starting_date" name="machine_starting_date" value="<?php echo $machine->machine_starting_date; ?>">
        </div>
      </div>

      <!-- Cautions -->
      <div class="form-group">
        <label class="control-label col-md-2" for="machine_cautions">Cautions:</label>
        <div class="col-md-10">
          <textarea class="form-control" id="machine_cautions" name="machine_cautions" rows="3"><?php echo $machine->machine_cautions; ?></textarea>
        </div>
      </div>

      <!-- Notes -->
      <div class="form-group">
        <label class="control-label col-md-2" for="machine_notes">Notes:</label>
        <div class="col-md-10">
          <textarea class="form-control" id="machine_notes" name="machine_notes" rows="3"><?php echo $machine->machine_notes; ?></textarea>
        </div>
      </div>
      
      <!-- Error messages -->
      <div class="form-group">
        <label class="text-danger col-md-12 text-left" for="notes">
            <?php //echo isset(validation_errors()); ?> 
        </label>
      </div>
        
      <!-- Submit Button -->
      <div class="form-group">
        <div class="col-md-offset-2 col-md-2">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div><div class="col-md-offset-2 col-md-2">
          <button type="submit" class="btn btn-primary">Reset</button>
        </div>
      
    </form>  
      <!-- Back Button -->
      
        <div class="col-md-2">
          <form action="<?php echo site_url('machines') ?>" method="post" class="form-horizontal">
          <button type="submit" class="btn btn-primary" onclick >Go back</button>
          </form>
        </div>
      <div class="col-md-6"> </div>
     </div>
    
  </div>

<!--Here ends the machine profile editing form--------------------------------->






  </div>
</div>


</section>

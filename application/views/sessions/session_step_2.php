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

<section class="container-fluid">
            <div class='row' id="my-main" >
                <div class='col-md-offset-1 col-md-10'>
                    <div class="panel panel-info">
                        <div class="panel-heading">
    <div class="card-header ">
      <div class="row">
<h3 class='col-md-9'>Dialysis Session Details</h3>
     <div class='col-md-3' style="margin-top: 20px;margin-bottom: 10px;">
     <div class="btn-group" role="group" aria-label="..."> 

</div>
    </div>

      </div>

      <div class="jumbotron">
      <div class="row">
         <div class="col-md-6">
        <h4><strong>Session Public ID: </strong><?php echo $session->hds_id_public; ?></h4>
        <h4><strong>Dialysis Type: </strong><?php echo ($session->hds_type==null)? '' : $hds_types[$session->hds_type] ; ?></h4>
    <?php  if ($session->hds_type==null) {?>
        <form action="<?php echo site_url('sessions/start/'.$session->hds_id_public); ?>" method="post">
        <div class="form-group">
            <input type="hidden"  id="save_additional" name="save_additional" value="save_additional" >
            <input type="hidden"  id="hds_id_public" name="hds_id_public" value="<?php echo $session->hds_id_pk ; ?>" >
            <select class="form-control" id="hds_type" name="hds_type" required>
                <option value=""></option>
                <option value="0">Haemodialysis</option>
                <option value="1">Peritoneal Dialysis</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

    <?php } ?>


      </div>
        <div class="col-md-6">
        <h5><strong>Created at:</strong> <?php echo $session->hds_createddt; ?></h5>
        <h5><strong>Unit :</strong> <?php echo $unit['unit_name']; ?></h5>
     
      </div>
      </div>

      <div class="alert alert-danger" role="alert">

      <h4><strong>Patient Details  </strong></h4>
      <div class="row">

      <div class="col-md-6">

      <h3><strong>Name:</strong> <?php echo $patient['p_name']; ?></h3>
      <h5><strong>Patient ID:</strong> <?php echo $session->hds_patientid; ?></h5>
      <h5><strong>Birth Day:</strong> <?php echo $patient['p_birthDate']; ?></h5>

      </div>
      <div class="col-md-6">
      <h4><strong>Age:</strong> <?php echo $session->hds_age; ?> years.</h5>
      <h4><strong>Catergory :</strong> <?php echo $patient['p_assignedcategory']; ?> </h5>

      </div>
    </div>
    </div>
        <div class="row"></div>
        <div class="alert alert-warning" style="padding: 40px;  ">
        <div class="col-md-6">

<h4><strong>Start Time:</strong> <?php echo $session->hds_startdt; ?></h4>

</div>
<div class="col-md-6">
<h4><strong>End Time:</strong> <?php echo $session->hds_stopdt; ?></h5>

</div>

</div>
</div>

<div class="row">

<div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-body">
  <h4><strong>Pre HD Parameters:</strong></h4>
<div class="form-group">
    <label for="hds_bednumber">Bed Number:</label>
    <div class="form-control" ><?php echo isset($session->hds_bednumber) ? $session->hds_bednumber : ''; ?> </div>

</div>

<div class="form-group">
    <label for="hds_machine_id">Machine ID:</label>
            <div class="form-control" ><?php echo isset($machines->machine_public_id) ? 
            $machines->machine_public_id .' - '.$machines->machine_manufacturer .' : '.$machines->machine_model : ''; ?> </div>
        </div>

<div class="form-group">
    <label for="hds_prehdweight">Pre-HD Weight:</label>
    <div class="form-control" ><?php echo isset($session->hds_prehdweight) ? $session->hds_prehdweight : ''; ?> </div>
</div>
<div class="form-group">
    <label for="hds_prehdbp">Pre-HD BP in mmhg - eg :120/80</label>
    <div class="form-control" ><?php echo isset($session) ? $session->hds_prehdbp : ''; ?>"     </div>
</div>
<div class="form-group">
    <label for="hds_heparinloading">Heparin Loading: (units)</label>
    <div class="form-control" ><?php echo isset($session) ? $session->hds_heparinloading : ''; ?>"     </div>
</div>






  </div>
</div>
</div>

<div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-body">
  <h4><strong>Post HD Parameters:</strong></h4>
  <form action="<?php echo site_url('sessions/end/'.$session->hds_id_public); ?>" method="post">
  <input type="hidden"  id="save_to_end" name="save_to_end" value="save_to_end" >
<input type="hidden"  id="hds_id_public" name="hds_id_public" value="<?php echo $session->hds_id_pk ; ?>" >
<div class="form-group">
    <label for="hds_bloodflowrate">Blood Flow Rate:</label>
    <input type="text" class="form-control" id="hds_bloodflowrate" name="hds_bloodflowrate" value="<?= isset($session->hds_bloodflowrate) ? $session->hds_bloodflowrate : ''; ?>" <?= ($session->hds_bloodflowrate == NULL) ? 'required' : 'readonly'; ?>>
</div>

<div class="form-group">
    <label for="hds_uf">UF Rate:</label>
    <input type="text" class="form-control" id="hds_uf" name="hds_uf" value="<?= isset($session->hds_uf) ? $session->hds_uf : ''; ?>" <?= ($session->hds_uf == NULL) ? 'required' : 'readonly'; ?>>
</div>


<div class="form-group">
    <label for="hds_heparinmaintenance">Heparin Maintenance:</label>
    <input type="text" class="form-control" id="hds_heparinmaintenance" name="hds_heparinmaintenance" value="<?= isset($session->hds_heparinmaintenance) ? $session->hds_heparinmaintenance : ''; ?>" <?= ($session->hds_heparinmaintenance == NULL) ? 'required' : 'readonly'; ?>>
</div>

<div class="form-group">
    <label for="hds_posthdweight">Post-HD Weight:</label>
    <input type="text" class="form-control" id="hds_posthdweight" name="hds_posthdweight" value="<?= isset($session->hds_posthdweight) ? $session->hds_posthdweight : ''; ?>" <?= ($session->hds_posthdweight == NULL) ? 'required' : 'readonly'; ?>>
</div>

<div class="form-group">
    <label for="hds_posthdbp">Post-HD BP:</label>
    <input type="text" class="form-control" id="hds_posthdbp" name="hds_posthdbp" value="<?= isset($session->hds_posthdbp) ? $session->hds_posthdbp : ''; ?>" <?= ($session->hds_posthdbp == NULL) ? 'required' : 'readonly'; ?>>
</div>



<div class="form-group">
    <label for="hds_erythropoietindose">Erythropoietin Dose:</label>
    <input type="text" class="form-control" id="hds_erythropoietindose" name="hds_erythropoietindose" value="<?= isset($session->hds_erythropoietindose) ? $session->hds_erythropoietindose : ''; ?>" <?= ($session->hds_erythropoietindose == NULL) ? 'required' : 'readonly'; ?>>
</div>

<div class="form-group">
    <label for="hds_remarks">Remarks/Complications:</label>
    <textarea class="form-control" id="hds_remarks" name="hds_remarks" rows="10" <?= ($session->hds_remarks == NULL) ? 'required' : 'readonly'; ?>><?= isset($session->hds_remarks) ? $session->hds_remarks : ''; ?></textarea>
</div>



<?php if($session->hds_status==3 ){ ?>
    <input type="submit" value="End Session"  >
          
<?php } ?>

</form>
  </div>
</div>


</div>


</div>
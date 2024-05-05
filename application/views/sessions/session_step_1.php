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
    <?php if($session->hds_status ==2 )   {?>
        <div class="row">
        <div class="col-md-6">

<h4><strong>Start Time:</strong> <?php echo $session->hds_startdt; ?></h4>

</div>
<div class="col-md-6">
<h4><strong>End Time:</strong> <?php echo $session->hds_stopdt; ?></h5>

</div>

        </div>
        <div class="alert alert-warning" style="padding: 40px;  ">
    <div class=""><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i> Dialysis Timer :<span id="timer" ></span>
</div>

</div>
<a href="<?php echo(site_url('sessions/stop/'.$session->hds_id_public)); ?>" type="button" class="btn btn-danger">STOP Dialysis</a>
</div>
<?php } ?>

</div>

<div class="row">

<div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-body">
  <h4><strong>Pre HD Parameters:</strong></h4>
  <form action="<?php echo site_url('sessions/start/'.$session->hds_id_public); ?>" method="post">
  <input type="hidden"  id="save_to_start" name="save_to_start" value="save_to_start" >
<input type="hidden"  id="hds_id_public" name="hds_id_public" value="<?php echo $session->hds_id_pk ; ?>" >
<div class="form-group">
    <label for="hds_bednumber">Bed Number:</label>
    <input type="text" class="form-control" id="hds_bednumber" name="hds_bednumber" value="<?php echo isset($session->hds_bednumber) ? $session->hds_bednumber : ''; ?>  "  
    <?php echo ($session->hds_bednumber==NULL)? 'required' : 'readonly'; ?>
    >
</div>

<div class="form-group">
    <label for="hds_machine_id">Machine ID:</label>

            <select class="form-control" id="hds_machine_id" name="hds_machine_id"      <?php echo ($session->hds_machine_id==NULL)? 'required' : 'readonly'; ?>
>
                                <option value=""></option>
                <?php  foreach($machines as $machine){ ?>
                <option value="<?php echo $machine->machine_id_pk; ?>"
                <?php    echo(isset($session) &&  $session->hds_machine_id == $machine->machine_id_pk ) ? "selected" : '';  ?>
                > <?php echo $machine->machine_public_id .' : '. $machine->machine_manufacturer.'-'. $machine->machine_model; ?></option>
                <?php } ?>

                <option value="0"></option>
            </select>
        </div>

<div class="form-group">
    <label for="hds_prehdweight">Pre-HD Weight:</label>
    <input type="text" class="form-control" id="hds_prehdweight" name="hds_prehdweight" value="<?php echo isset($session->hds_prehdweight) ? $session->hds_prehdweight : ''; ?>"     <?php echo ($session->hds_prehdweight==NULL)? 'required' : 'readonly'; ?>
>
</div>

<div class="form-group">
    <label for="hds_prehdbp">Pre-HD BP in mmhg - eg :120/80</label>
    <input type="text" class="form-control" id="hds_prehdbp" name="hds_prehdbp" value="<?php echo isset($session) ? $session->hds_prehdbp : ''; ?>"     <?php echo ($session->hds_prehdbp==NULL)? 'required' : 'readonly'; ?>
>
</div>

<div class="form-group">
    <label for="hds_heparinloading">Heparin Loading: (units)</label>
    <input type="text" class="form-control" id="hds_heparinloading" name="hds_heparinloading" value="<?php echo isset($session) ? $session->hds_heparinloading : ''; ?>"     <?php echo ($session->hds_heparinloading==NULL)? '' : 'readonly'; ?>
>
</div>
<?php if($session->hds_status==1 ){ ?>
    <input type="submit" value="Start Session"  >
          
<?php } ?>
</form>





  </div>
</div>
</div>

<div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-body">
  <h4><strong>Post HD Parameters:</strong></h4>
  </div>
</div>


</div>
<?php if($session->hds_started_user_id_pk!=NULL && $session->hds_startdt!=NULL && $session->hds_enddt==NULL && $session->hds_stop_user_id_pk==NULL )   {?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
<?php 

$dateParts = date_parse($session->hds_startdt);
$givenYear = $dateParts['year'];
$givenMonth = $dateParts['month'] - 1; // Note: month is zero-based in JavaScript
$givenDay = $dateParts['day'];
$givenHour = $dateParts['hour'];
$givenMinute = $dateParts['minute'];
$givenSecond = $dateParts['second'];


?>

let timerInterval;
        let startTime;
        $(document).ready(function() {

            startTime = moment();
            timerInterval = setInterval(updateTimer, 1000);
        });


            function updateTimer() {
                 // Start the timer from a specific time (e.g., 10:30:00)
        let givenTime = moment().set({ hour: <?php echo $givenHour; ?>, minute: <?php echo $givenMinute; ?>, second: <?php echo $givenSecond; ?> });
        let currentTime = moment();
        let elapsedSeconds = currentTime.diff(givenTime, 'seconds');
        let elapsedDuration = moment.duration(elapsedSeconds, 'seconds');
        let elapsedHours = elapsedDuration.hours();
        let elapsedMinutes = elapsedDuration.minutes();
        let elapsedSecondsOutput = elapsedDuration.seconds();
        $('#timer').text(formatTime(elapsedHours) + ':' + formatTime(elapsedMinutes) + ':' + formatTime(elapsedSecondsOutput));
        }

        function formatTime(time) {
            return time < 10 ? '0' + time : time;
        }

   
          



    
</script>
<?php } ?>

</div>
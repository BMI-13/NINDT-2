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
                    <div class="panel panel-info">
                        <div class="panel-heading">
    <div class="card-header ">
      <div class="row">
<h3 class='col-md-9'> Machine Details</h3>
     <div class='col-md-3' style="margin-top: 20px;margin-bottom: 10px;">
     <div class="btn-group" role="group" aria-label="..."> 
     <button onclick="confirmEdit()"  class="btn btn-warning">&nbsp; <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit &nbsp;</button>
     <?php
     if($machine_data->machine_active){ ?>
      <button onclick="ChangeStatus('disable',<?php  echo($machine_data->machine_id_pk);  ?>)" type="button" class="btn btn-danger">&nbsp; <i class="fa fa-power-off" aria-hidden="true"></i> Disable &nbsp;</button>
     <?php }else{ ?>
      <button onclick="ChangeStatus('enable',<?php  echo($machine_data->machine_id_pk);  ?>)" type="button" class="btn btn-success">&nbsp; <i class="fa fa-power-off" aria-hidden="true"></i> Enable &nbsp;</button>
     <?php }?>

</div>
    </div>
      </div>
     
    </div>
</div>
</div>
</div>
<div class="container">
  <div class="card">

    <div class="card-body">
      <div class="row">
         <div class="col-md-6">
          <p><strong>Machine Public ID:</strong> <?php echo $machine_data->machine_public_id; ?></p>
          <p><strong>Unit:</strong> <?php echo $machine_data->machine_unit; ?></p>
          <p><strong>Machine Serial:</strong> <?php echo $machine_data->machine_serial; ?></p>
          <p><strong>Active:</strong> <?php echo $machine_data->machine_active ? 'Yes' : 'No'; ?></p>
        </div>
        <div class="col-md-6">
        <p><strong>Manufacturer:</strong> <?php echo $machine_data->machine_manufacturer; ?></p>
        <p><strong>Model:</strong> <?php echo $machine_data->machine_model; ?></p>

          <p><strong>Starting Date:</strong> <?php echo $machine_data->machine_starting_date; ?></p>
        </div>
      </div>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4><strong>Cautions</strong></h4>
          <?php echo $machine_data->machine_cautions; ?></p>
        </div>
        <div class="col-md-6">
          <h4><strong>Notes</strong></h4>
          <?php echo $machine_data->machine_notes; ?></p>
        </div>
      </div>
    </div>

    <div class="panel panel-info">
<div class="panel-heading">
    <div class="card-header">
     <h5> Last 10 Dialysis </h5>
    </div>
</div>
</div>
    <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Machine Barcode</th>
                                            <th>Unit</th>
                                            <th class="text-center">Manufacturer - Model</th>
                                            <th class='text-center'>Current Status</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            //populating with data
                                            if( !isset($sessions) ){
                                                echo "<tr><td colspan='5' align='center'>There is no result to display.</td></tr>" ;
                                            }else{
                                                foreach( $sessions as $machine ){
                                                    $view_url   = site_url("machines/view/{$machine['machine_id']}");
                                                    echo "<tr>
                                                            <td>{$machine['machine_barcode']}</td>
                                                            <td>{$machine['machine_serial']}</td>
                                                            <td class='text-center'>{$machine['machine_manufacturer']} - {$machine['machine_model']}</td>
                                                            <td class='text-center'>";
                                                            
                                                           echo ($machine['machine_active'])?
                                                                '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>'
                                                                :
                                                                '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';

                                                            

                                                            echo "</td>
                                                            <td class='text-right mycss-middle' >
                                                                <a href='{$view_url}'><button type='button' class='btn btn-primary btn-xs' title='more' ><span class='glyphicon glyphicon-chevron-right'></button></a>
                                                            </td></tr>";
                                                }//for each
                                            }//else
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>




  </div>
</div>
<script>
    function ChangeStatus(status,machine_id) {
        // Display a SweetAlert confirmation dialog
        swal({
            title: "Are you sure?",
            text: "Once disabled, you will not be able to use this machine!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willEnableDisable) => {
            if (willEnableDisable) {
                // If user confirms, call disable_machine function via AJAX with machine_id
                changeStatusMachine(status, machine_id);
            }
        });
    }

    function changeStatusMachine(status,machine_id) {
console.log(status);
        // Send an AJAX request to disable the machine
        $.ajax({
            url: "<?php echo site_url('machines/enabledisable_machine'); ?>",
            type: "POST",
            dataType: "json",
            data: {
                machine_id: machine_id,
                status: status
            },  success: function(response) {
                if (response.status === 'success') {
                    // Show success message
                    swal(response.message, {
                        icon: "success",
                    }).then(() => {
                        // Refresh the page after showing the success message
                        window.location.reload();
                    });
                } else {
                    // Show error message
                    swal("Error occurred: " + response.message, {
                        icon: "error",
                    });
                }
            },
            error: function(xhr, status, error) {
                // Show error message
                swal("Error occurred: " + error, {
                    icon: "error",
                });
            }
        });
    }



    function confirmEdit() {
        // Display a SweetAlert confirmation dialog
        swal({
            title: "Are you sure?",
            text: "Do you want to edit this machine?",
            icon: "info",
            buttons: true,
            dangerMode: false,
        })
        .then((willEdit) => {
            if (willEdit) {
                // If user confirms, redirect to the edit page with machine_id
                window.location.href = "<?php echo site_url('machines/edit/'.$machine_data->machine_id_pk); ?>" ;
            }
        });
    }





</script>

</section>

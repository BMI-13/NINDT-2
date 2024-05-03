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
<h3 class='col-md-9'> Patient Details</h3>
     <div class='col-md-3' style="margin-top: 20px;margin-bottom: 10px;">
     <div class="btn-group" role="group" aria-label="..."> 
     <button onclick="confirmEdit()"  class="btn btn-warning">&nbsp; <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit &nbsp;</button>

</div>
    </div>

      </div>

      <div class="jumbotron">
      <div class="row">
         <div class="col-md-6">
        <h4><strong>Full Name: </strong><?php echo $patient->p_name; ?></h4>
        <h4><strong>Gender: </strong><?php echo $patient->p_gender; ?></h4>
        <h4><strong>Date of Birth: </strong><?php echo $patient->p_birthDate; ?></h4>
        <h4><strong>Age: </strong><?php echo $age->format(" %Y Year(s), %M Month(s), Old"); ?></h4>
        <h6><button type="button" class="btn btn-success" data-toggle="modal" data-target="#contactModel">Contact</button></h6>
      </div>
        <div class="col-md-6">
        <h4><strong>NINDT ID:</strong> <?php echo $patient->p_nindt_id; ?></h4>
          <h4><strong>OLD NINDT ID:</strong> <?php echo $patient->p_old_nindt_id; ?></h4>
          <h4><strong>NIC ID:</strong> <?php echo $patient->p_nic; ?></h4>
          <h4><strong>Address:</strong> <?php echo nl2br($patient->p_address); ?></h4>
      </div>


     
    </div>
</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="contactModel" tabindex="-1" role="dialog" aria-labelledby="contactModelLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="contactModelLabel">Contact Details</h4>

        
      </div>
      <div class="modal-body">

      <ul class="list-group">
  <li class="list-group-item"><b>Contact Persons Name :</b><?php echo $patient->p_contact_person_name; ?></li>
  <li class="list-group-item"><b>Contact Numbers :</b><?php 
  
$datas = explode(",", $patient->p_tpnumber);
foreach ($datas as $data ){
print_r ( "<a href='tel:{$data}' class='list-group-item-text'>{$data}</a><br />"  );
}

?>
  <li class="list-group-item"><b>Contact Email :</b><a href='mail:<?php echo $patient->p_email; ?>'><?php echo $patient->p_email; ?></a></li>
</ul>


    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




    <div class="panel panel-info">
<div class="panel-heading">
    <div class="card-header">
     <h3> Previous 10 Dialysis </h3>
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
                window.location.href = "<?php echo site_url('machines/edit/'.$patient->machine_id_pk); ?>" ;
            }
        });
    }





</script>

</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js" ></script>

<script>
    function confirmEdit() {
        // Display a SweetAlert confirmation dialog
        swal({
            title: "Are you sure?",
            text: "Do you want to edit this patient?",
            icon: "info",
            buttons: true,
            dangerMode: false,
        })
        .then((willEdit) => {
            if (willEdit) {
                // If user confirms, redirect to the edit page with machine_id
                window.location.href = "<?php echo site_url('patients/edit/'.$patient->p_id_pk); ?>" ;
            }
        });
    }





</script>
<script>


</script>
</div>
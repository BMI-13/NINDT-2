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
<?php
?>
      <div class="jumbotron">
      <div class="row">
         <div class="col-md-6">
        <h4><strong>Name: </strong><?php echo $user->user_name; ?></h4>
        <h4><strong>Email: </strong><?php echo $user->user_email; ?></h4>
        <h6><a href="tel:<?php echo $user->user_tpnumber; ?>"  class="btn btn-success">Contact <?php echo $user->user_tpnumber; ?></a></h6>
        <h6><a href="<?php site_url('staff/change_password') ?>"  class="btn btn-danger">Change Password</a></h6>
      </div>
        <div class="col-md-6">
        <h4><strong>Role:</strong> <?php echo $user->user_role; ?></h4>
          <h4><strong>Unit :</strong> <?php echo $user->user_unit_name; ?></h4>
          <h4><strong>NIC ID:</strong> <?php echo $user->user_nic; ?></h4>
      </div>


     
    </div>
</div>
</div>
</div>

</div>

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
                window.location.href = "<?php echo site_url('staff/edit/'.$user->user_id_pk ); ?>" ;
            }
        });
    }



</script>
<script>


</script>
</div>
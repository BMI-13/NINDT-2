<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<?php 


?>        

    <body>
        <header>
        <?php $this->load->view('templates/navbar'); ?>    
        </header>
        
        <!-- main section -->
        <section class="container-fluid">
            <div class='row' id="my-main" >

            <?php   
                        if (isset($is_notification)) {
                            $this->load->view('templates/notification');
                        }
            ?>


                <div class='col-md-offset-1 col-md-10'>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class='row'>
                                <div class='col-md-3'>
                                    <h3 class="panel-title" style='margin-top:10px;'>Units</h3>
                                </div>
                                <div class='col-md-2'>

                            </div>
                                <div class='col-md-7 text-right'>
                                    <form class="form-inline" method="post" action="<?php echo site_url('units/search'); ?>" onsubmit='return validate_search()' >
                                        <div class="form-group">
                                            <select class="form-control input-sm mycss-search-key" name="list_key" id="list_key">
                                                <option value="un_name" <?php if($this->session->userdata("machines_search_key") == "un_name"){echo "selected='selected'";}?> >Name</option>
                                                <option value="un_hospital" <?php if($this->session->userdata("machines_search_key") == "un_hospital"){echo "selected='selected'";}?> >Hospital Name</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-sm mycss-search-value" name="txt_value" id="txt_value" value="<?php echo $this->session->userdata("machines_search_value");?>"  placeholder="search value" />
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-search"></span></button>
                                            <a href="<?php echo site_url('machines/clear_search'); ?>"><button type="button" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-erase"></span></button></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Unit NAme</th>
                                            <th>Hospital</th>
                                            <th class='text-center'>Current Status</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            //populating with data
                                            if( !$units ){
                                                echo "<tr><td colspan='5' align='center'>There is no result to display.</td></tr>" ;
                                            }else{
                                                foreach( $units as $unit ){
                                                    $view_url   = site_url("units/view/{$unit['unit_id_pk']}");
                                                    echo "<tr>
                                                            <td>{$unit['unit_name']}</td>
                                                            <td>{$unit['unit_hospital']}</td>
                                                            <td class='text-center'>";
                                                            
                                                           echo ($unit['unit_active'])?
                                                                '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>'
                                                                :
                                                                '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
                                                            echo "</td>
                                                            <td class='text-right mycss-middle' >";?>


                                                            <?php if($unit['unit_active'])  {?>

                                                            <button onclick="ChangeStatus('disable',<?php $unit['unit_id_pk'] ?>)"   class='btn btn-default' href='#' role='button'><span class='glyphicon glyphicon-remove-sign'></span> Disable</button>
                                                            <?php }else{ ?> 
                                                            <button onclick="ChangeStatus('enable',<?php $unit['unit_id_pk'] ?>)" class='btn btn-default' href='#' role='button'><span class='glyphicon glyphicon-ok-sign'></span> Enable</button>
                                                            <?php } ?>
                                                            <button onclick="confirmEdit(<?php $unit['unit_id_pk'] ?>)" class='btn btn-default' href='#' role='button'><span class='glyphicon glyphicon-edit'></span> Edit</button>
                                                            <?php 
                                                            /*echo "    <a href='{$view_url}'><button type='button' class='btn btn-primary btn-xs' title='more' ><span class='glyphicon glyphicon-chevron-right'></button></a>*/
                                                            echo "</td></tr>";
                                                }//for each
                                            }//else
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class='row'>
                                <div class='col-sm-3'>
                                    <strong>Total Records: <?php echo $total_rows; ?></strong>
                                </div>
                                <div class='col-sm-9 text-right'>
                                    <!--pagination-->
                                    <ul class="pagination pagination-sm" style='margin-top:0px;'>
                                       <?php if(isset($pagination_html)){echo $pagination_html;}?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>

                <script>
    function ChangeStatus(status,unit_id) {
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
                // If user confirms, call disable_machine function via AJAX with unit_id
                changeStatusMachine(status, unit_id);
            }
        });
    }

    function changeStatusMachine(status,unit_id) {
console.log(status);
        // Send an AJAX request to disable the machine
        $.ajax({
            url: "<?php echo site_url('units/enabledisable_unit'); ?>",
            type: "POST",
            dataType: "json",
            data: {
                unit_id: unit_id,
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



    function confirmEdit(machimeid) {
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
                // If user confirms, redirect to the edit page with unit_id
                window.location.href = "<?php echo site_url('units/edit/' )?>"+machimeid ;
            }
        });
    }





</script>
            </div>
            

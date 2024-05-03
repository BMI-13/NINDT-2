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
                        if ($is_notification) {
                            $this->load->view('templates/notification');
                        }
            ?>


                <div class='col-md-offset-1 col-md-10'>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class='row'>
                                <div class='col-md-3'>
                                    <h3 class="panel-title" style='margin-top:10px;'>Dialysis Sessions</h3>
                                </div>
                                <div class='col-md-2'>

                            </div>
                                <div class='col-md-7 text-right'>
                                    <form class="form-inline" method="post" action="<?php echo site_url('sessions/search'); ?>" onsubmit='return validate_search()' >
                                        <div class="form-group">
                                            <select class="form-control input-sm mycss-search-key" name="list_key" id="list_key">
                                                <option value="hds_id_public " <?php if($this->session->userdata("sessions_search_key") == "hds_id_public "){echo "selected='selected'";}?> >Dialysis No</option>
                                                <option value="hds_patientid" <?php if($this->session->userdata("sessions_search_key") == "hds_patientid"){echo "selected='selected'";}?> >Patient NINDT ID</option>
                                                <option value="ma_status" <?php if($this->session->userdata("sessions_search_key") == "ma_status"){echo "selected='selected'";}?> >Status: A | N </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-sm mycss-search-value" name="txt_value" id="txt_value" value="<?php echo $this->session->userdata("sessions_search_value");?>"  placeholder="search value" />
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-search"></span></button>
                                            <a href="<?php echo site_url('sessions/clear_search'); ?>"><button type="button" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-erase"></span></button></a>
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
                                            <th>Prescription ID</th>
                                            <th>Unit</th>
                                            <th class="text-center">Manufacturer - Model</th>
                                            <th class='text-center'>Current Status</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            //populating with data
                                            if( !$sessions ){
                                                echo "<tr><td colspan='5' align='center'>There is no result to display.</td></tr>" ;
                                            }else{
                                                foreach( $sessions as $prescription ){
                                                    $view_url   = site_url("sessions/view/{$prescription['prescription_id_pk']}");
                                                    echo "<tr>
                                                            <td>{$prescription['prescription_public_id']}</td>
                                                            <td>{$prescription['prescription_serial']}</td>
                                                            <td class='text-center'>{$prescription['prescription_manufacturer']} - {$prescription['prescription_model']}</td>
                                                            <td class='text-center'>";
                                                            
                                                           echo ($prescription['prescription_active'])?
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
            </div>
            

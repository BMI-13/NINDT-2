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
        
        <!-- main section -->
        <section class="container-fluid">
            <div class='row' id="my-main" >
                <div class='col-md-offset-1 col-md-10'>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class='row'>
                                <div class='col-md-4'>
                                    <h3 class="panel-title" style='margin-top:10px;'>Patients</h3>
                                </div>
                                <div class='col-md-8 text-right'>
                                    <form class="form-inline" method="post" action="<?php echo site_url('patients/search'); ?>" onsubmit='return validate_search()' >
                                        <div class="form-group">
                                            <select class="form-control input-sm mycss-search-key" name="list_key" id="list_key">
                                                <option value="p_nindt_id" <?php if($this->session->userdata("patients_search_key") == "p_nindt_id"){echo "selected='selected'";}?> >NINDT Number New</option>
                                                <option value="p_old_nindt_id " <?php if($this->session->userdata("patients_search_key") == "p_old_nindt_id "){echo "selected='selected'";}?> >NINDT Number Old</option>
                                                <option value="p_gender" <?php if($this->session->userdata("patients_search_key") == "p_gender"){echo "selected='selected'";}?> >Gender: m | f</option>
                                                <option value="p_status" <?php if($this->session->userdata("patients_search_key") == "p_status"){echo "selected='selected'";}?> >Status: C | L | D</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-sm mycss-search-value" name="txt_value" id="txt_value" value="<?php echo $this->session->userdata("patients_search_value");?>"  placeholder="search value" />
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-search"></span></button>
                                            <a href="<?php echo site_url('patients/clear_search'); ?>"><button type="button" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-erase"></span></button></a>
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
                                            <th>Reg No</th>
                                            <th>Patient Name</th>
                                            <th class="text-center">Gender</th>
                                            <th class='text-center'>Status</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            //populating with data
                                            if( !$patients ){
                                                echo "<tr><td colspan='5' align='center'>There is no result to display.</td></tr>" ;
                                            }else{
                                                foreach( $patients as $pt ){
                                                    $view_url   = site_url("patients/view/{$pt['p_id']}");
                                                    echo "<tr>
                                                            <td>{$pt['p_nindt_id']}</td>
                                                            <td>{$pt['p_name']}</td>
                                                            <td class='text-center'>{$pt['p_gender']}</td>
                                                            <td class='text-center'>{$pt['p_status']}</td>
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
            

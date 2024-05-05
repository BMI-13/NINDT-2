<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<?php 

//var_dump($sessions);
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
                                                <option value="hds_id_public" <?php if($this->session->userdata("sessions_search_key") == "hds_id_public"){echo "selected='selected'";}?> >Patient NINDT ID</option>
                                                <option value="hds_id_public" <?php if($this->session->userdata("sessions_search_key") == "hds_id_public"){echo "selected='selected'";}?> >Status: 0 | 1 | 2 | 3 | 4 </option>
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
                                            <th>Dialysis ID</th>
                                            <th>NAme</th>
                                            <th class="text-center">Bed - Machine</th>
                                            <th class='text-center'>Status</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

$hds_status_link=array(1=>"start",2=>"processing",3=>"stop",4=>"completed", null=>'completed');


                                            //populating with data
        $criteria[] = 'hds_createddt IS NOT NULL';
        $criteria[] = 'hds_created_user_id_pk IS NOT NULL';

                                            if( !$sessions ){
                                                echo "<tr><td colspan='5' align='center'>There is no result to display.</td></tr>" ;
                                            }else{
                                                foreach( $sessions as $session ){

                                                    $view_url   = site_url("sessions/{$hds_status_link[$session['hds_status']]}/{$session['hds_id_public']}");
                                                    echo "<tr>
                                                            <td>{$session['hds_id_public']}</td>
                                                            <td>{$session['p_name']} - {$session['hds_patientid']} years</td>
                                                            <td class='text-center'>{$hds_types[$session['hds_type']]} </td>
                                                            <td class='text-center'>";

                                                            
                                                            if($session['hds_status'] ==0)
                                                            {echo'<i class="fa fa-flag-checkered" aria-hidden="true"></i>';}

                                                          elseif($session['hds_status'] ==1)
                                                            {echo'<i class="fa fa-hourglass-start" aria-hidden="true"></i>';}

                                                          elseif($session['hds_status'] ==2)
                                                            {echo'<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>';}

                                                          elseif($session['hds_status'] ==3)
                                                            {echo'<i class="fa fa-stop" aria-hidden="true"></i>';}

                                                          elseif($session['hds_status'] ==4)
                                                            {echo'<i class="glyphicon glyphicon-ok" aria-hidden="true"></i>';}

                                                          




                                                           
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
            

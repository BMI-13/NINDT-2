<section class="container-fluid">
            <div class='row' id="my-main" >
                <div class='col-md-offset-1 col-md-10'>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class='row'>
                                <div class='col-md-4'>
                                    <h3 class="panel-title" style='margin-top:10px;'>Staff</h3>
                                </div>
                                <div class='col-md-8 text-right'>
                                    <form class="form-inline" method="post" action="<?php echo site_url('patients/search'); ?>" onsubmit='return validate_search()' >
                                        <div class="form-group">
                                            <select class="form-control input-sm mycss-search-key" name="list_key" id="list_key">
                                                <option value="s_id" <?php if($this->session->userdata("staff_search_key") == "s_id"){echo "selected='selected'";}?> >Name</option>
                                                <option value="s_gender" <?php if($this->session->userdata("staff_search_key") == "s_gender"){echo "selected='selected'";}?> >Gender: m | f</option>
                                                <option value="s_email" <?php if($this->session->userdata("staff_search_key") == "s_email"){echo "selected='selected'";}?> >Status: C | L | D</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-sm mycss-search-value" name="txt_value" id="txt_value" value="<?php echo $this->session->userdata("staff_search_value");?>"  placeholder="search value" />
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
                                            <th> Name</th>
                                            <th>email</th>
                                            <th class="text-center">Role</th>
                                            <th class='text-center'>Unit</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            //populating with data
                                            if( !$staff ){
                                                echo "<tr><td colspan='5' align='center'>There is no result to display.</td></tr>" ;
                                            }else{
                                                foreach( $staff as $st ){
                                                    $view_url   = site_url("staff/view/{$st['user_id_pk']}");
                                                    echo "<tr>
                                                            <td>{$st['user_name']}</td>
                                                            <td>{$st['user_email']}</td>
                                                            <td class='text-center'>{$st['user_role']}</td>
                                                            <td class='text-center'>{$st['user_unit_name']}</td>
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
            

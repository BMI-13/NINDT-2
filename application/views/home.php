<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<?php $this->load->view('templates/head'); ?>    
        <style type="text/css">
            body {
                background-image: url('<?php echo $this->config->item('sys_imgs'). 'login.jpg'; ?>');
                background-position: center;
                background-repeat: no-repeat;
            }
            
            #my-signin {
                margin-top: 70px;
            }
        
        </style>
    <body class='container-fluid'>

    <div class="text-center" style=" display: flex;      justify-content: center;      align-items: center;">

        <img src="<?php echo $this->config->item('sys_imgs'). 'logo22.png'; ?>" alt="Logo" height="200" width="200"/ class="img-responsive" style="padding: 10px;">
    </div>
        <section id="my-main">
        <div class="row text-center" style="color: white; padding: 10px; background-color: #007bff;"><h1>HD List</h1></div>

            <div class="row">
                <div class='col-md-offset-4 col-md-4'>
                    <div class="panel panel-primary" id='my-signin'>
                        <div class="panel-heading">
                            Sign In
                        </div>
                        <div class="panel-body">
                            <form method="post" action="<?php echo site_url('home/signin'); ?>" >
                                <div class='form-group'>
                                    <input type='text' name="txt_user_name" class='form-control' placeholder="User Name"/>
                                </div>
                                <div class='form-group'>
                                    <input type='password' name="txt_user_psw" class='form-control' placeholder="Password"/>
                                </div>
                                <div class='form-group text-right'>
                                    <button type='submit' class='btn btn-primary'>Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
            
            <div class="row">
                <div class='col-md-offset-4 col-md-4'>
                    <?php   
                        if ($is_notification) {
                            $this->load->view('templates/notification');
                        }
                    ?>
                </div>
            </div>
        </section>
        
        
    <?php $this->load->view('templates/footer'); ?>    

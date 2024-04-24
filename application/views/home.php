<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>BS3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo $this->config->item('css'). 'bootstrap.min.css'; ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $this->config->item('css'). 'app.css'; ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo $this->config->item('js'). 'jquery-3.7.1.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo $this->config->item('js'). 'bootstrap.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo $this->config->item('js'). 'app.js'; ?>" type="text/javascript"></script>
        <style type="text/css">
            body {
                background-image: url('<?php echo $this->config->item('sys_imgs'). 'login.jpg'; ?>');
                background-position: center;
                background-repeat: no-repeat;
            }
            
            #my-signin {
                margin-top: 80px;
            }
        
        </style>
        
    </head>
    <body class='container-fluid'>
        <section id="my-main">
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

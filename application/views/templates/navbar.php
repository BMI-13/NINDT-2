
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"> 
            <img src="<?php echo $this->config->item('sys_imgs'). 'logo22.png'; ?>" alt="Logo" height="45" width="45"/>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <!-- admin -->
            <?php if($this->session->userdata('user_role') === 'admin') { ?>
                <li class="dropdown  ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Administration  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="<?php echo site_url('users'); ?>"><span class="glyphicon glyphicon-user" ></span> Users</a></li>
                      <li><a href="<?php echo site_url('user/add'); ?>"><span class="glyphicon glyphicon-plus" ></span> New User</a></li>
                  </ul>
                </li>

            <?php } ?>
            <!-- staff -->
            <?php if($this->session->userdata('user_role') === 'staff') { ?>
                <li class="dropdown ">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-heart" aria-hidden="true"></i>  Patients  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('patients'); ?>"><span class="glyphicon glyphicon-user" ></span> Patients</a></li>
                    <li><a href="<?php echo site_url('patients/add'); ?>"><span class="glyphicon glyphicon-plus" ></span> New Patient</a></li>
                    
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-life-ring" aria-hidden="true"></i> Machines  <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('machines'); ?>"><i class="fa fa-asterisk" aria-hidden="true"></i> Machines</a></li>
                    <li><a href="<?php echo site_url('machines/add'); ?>"><span class="glyphicon glyphicon-plus" ></span> Add Machine</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-sticky-note" aria-hidden="true"></i> Dialysys Sessions  <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('sessions/current'); ?>"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Current Dialysys Sessions</a></li>
                    <li><a href="<?php echo site_url('sessions'); ?>"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> All Dialysys Sessions</a></li>
                    <li><a href="<?php echo site_url('sessions/new'); ?>"><span class="glyphicon glyphicon-plus" ></span> New Dialysys Sessions</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i> Units  <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('units'); ?>"><i class="fa fa-hospital-o" aria-hidden="true"></i>                      Units</a></li>
                    <li><a href="<?php echo site_url('units/add'); ?>"><span class="glyphicon glyphicon-plus" ></span> Add Units</a></li>
                  </ul>
                </li>
                </li>


                <li role="presentation" class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="glyphicon glyphicon-user" aria-hidden="true"></i> Staff  <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('staff'); ?>"><i class="fa fa-users" aria-hidden="true"></i> Staff</a></li>
                    <li><a href="<?php echo site_url('staff/add'); ?>"><span class="glyphicon glyphicon-plus" ></span> Add Staff</a></li>
                  </ul>
                </li>



                </li>


                <li><a href="<?php echo site_url('machines'); ?>"></a></li>
                <li><a href="<?php echo site_url('reports'); ?>"><i class="fa fa-sticky-note" aria-hidden="true"></i>  Dialysys Prescriptions</a></li>
                <li><a href="<?php echo site_url('reports'); ?>"><span class="glyphicon glyphicon-file" ></span> Reports</a></li>
                    
            <?php } ?>    
          
        </ul>
        
          <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url('home/signout'); ?>">Sign Out</a></li>
              <li><a href="#">My Profile</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>